<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255|unique:categories,name',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput()->with(['form' => 'error']);
        }

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('all-categories')->with([
            'status' => 'success',
            'message' => 'Category created successfully',
        ]);
    }

    public function editCategory(Category $category)
    {
        return view('admin.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('all-categories')->with([
            'status' => 'success',
            'message' => 'Category updated successfully',
        ]);
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->route('all-categories')->with([
            'status' => 'success',
            'message' => 'Category deleted successfully',
        ]);
    }
}
