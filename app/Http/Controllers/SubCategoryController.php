<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function subcategory(Category $category)
    {
        $subcategories = $category->subCategories;
        return view('admin.sub-categories', compact('category', 'subcategories'));
    }

    public function addSubCategory(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'name' => 'required|string|min:3|max:255|unique:sub_categories,name',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput()->with(['form' => 'error']);
        }

        $subcategory = SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('image')) {
            $subcategory->addMedia($request->image)
                ->usingFileName($request->image->getclientOriginalName())
                ->toMediaCollection('image');
        }

        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Sub Category created successfully',
        ]);
    }

    public function editSubCategory(Category $category, SubCategory $subcategory)
    {
        return view('admin.edit-sub-category', compact('category', 'subcategory'));
    }

    public function updateSubCategory(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'name' => 'required|string|min:3|max:255|unique:sub_categories,name,' . $subcategory->id,
        ]);

        $subcategory->update([
            'name' => $request->name,
        ]);
        if ($request->hasFile('image')) {
            $subcategory->clearMediaCollection('image');
            $subcategory->addMedia($request->image)
                ->usingFileName($request->image->getclientOriginalName())
                ->toMediaCollection('image');
        }

        return redirect()->route('all-sub-categories', $subcategory->category->slug)->with([
            'status' => 'success',
            'message' => 'Sub Category updated successfully',
        ]);
    }

    public function deleteSubCategory(SubCategory $subcategory)
    {
        $subcategory->clearMediaCollection('image');
        $subcategory->delete();
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Sub Category deleted successfully',
        ]);
    }
}
