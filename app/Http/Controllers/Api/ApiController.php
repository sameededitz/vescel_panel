<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function categories()
    {
        $categories = Category::with('subcategories')->get();

        return response()->json([
            'status' => true,
            'categories' => $categories,
        ], 200);
    }

    public function products(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:sub_categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        $products = Product::where('category_id', $request->category_id)
            ->where('sub_category_id', $request->subcategory_id)
            ->where('is_active', true)
            ->orderby('created_at', 'asc')
            ->get();

        return response()->json([
            'status' => true,
            'products' => $products,
        ], 200);
    }

    public function orders()
    {
        $orders = Order::withCount('items')
            ->where('user_id', Auth::id())
            ->get();


        return response()->json([
            'status' => true,
            'orders' => $orders,
        ], 200);
    }

    public function orderDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        $order = Order::with('items.product')  // Eager load order items and their associated products
            ->where('user_id', Auth::id())
            ->where('id', $request->order_id)
            ->first();

        // Check if the order exists
        if (!$order) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found or does not belong to the authenticated user.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'order' => $order,
        ], 200);
    }

    public function storeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'total_price' => 'required|numeric',
            'comments' => 'required|string',
            'signature' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()
            ], 400);
        }

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        DB::beginTransaction();

        try {
            $order = $user->orders()->create([
                'total_price' => $request->total_price,
                'comments' => $request->comments,
            ]);
            if ($request->hasFile('signature')) {
                $order->addMedia($request->signature)
                    ->usingFileName($request->signature->getClientOriginalName())
                    ->toMediaCollection('signature');
            }

            // Process products and create order items
            foreach ($request->products as $productData) {
                $product = Product::findOrFail($productData['product_id']);

                // Check if enough units are available
                if ($product->units < $productData['quantity']) {
                    throw new \Exception("Insufficient stock for product ID: {$product->id}");
                }

                $product->units -= $productData['quantity'];
                $product->save();

                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $productData['quantity'],
                    'price' => $productData['price'],
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Order created successfully.',
                'order_id' => $order->id,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}