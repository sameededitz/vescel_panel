<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function addProduct()
    {
        return view('admin.add-product');
    }

    public function editProduct(Product $product)
    {
        return view('admin.edit-product', compact('product'));
    }

    public function deleteProduct(Product $product)
    {
        $product->clearMediaCollection('image');
        $product->delete();
        return redirect()->route('all-products')->with([
            'status' => 'success',
            'message' => 'Product deleted successfully'
        ]);
    }
}
