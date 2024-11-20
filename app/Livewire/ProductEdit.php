<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $product;

    #[Validate]
    public $image;
    #[Validate]
    public $name;
    #[Validate]
    public $category;
    #[Validate]
    public $subCategory;
    #[Validate]
    public $price;
    #[Validate]
    public $discount;
    #[Validate]
    public $units;
    #[Validate]
    public $status;
    #[Validate]
    public $description;

    public $categories;
    public $subCategories = [];

    protected function rules()
    {
        return [
            'image' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif',
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'subCategory' => 'required|exists:sub_categories,id',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'units' => 'required|numeric',
            'status' => 'required|in:1,0',
            'description' => 'required|string|max:255',
        ];
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->category = $product->category_id;
        $this->subCategory = $product->sub_category_id;
        $this->price = $product->price;
        $this->discount = $product->discount_percentage;
        $this->units = $product->units;
        $this->status = $product->is_active;
        $this->description = $product->description;

        $this->categories = Category::all();
        $this->subCategories = SubCategory::where('category_id', $this->category)->get();
    }

    public function removeImage()
    {
        $this->image = null;
    }

    public function updatedCategory($value)
    {
        $this->subCategories = SubCategory::where('category_id', $value)->get();
    }

    public function submit()
    {
        $this->validate();
        $this->product->update([
            'name' => $this->name,
            'category_id' => $this->category,
            'sub_category_id' => $this->subCategory,
            'price' => $this->price,
            'discount_percentage' => $this->discount,
            'units' => $this->units,
            'description' => $this->description,
            'is_active' => $this->status
        ]);

        if ($this->image) {
            $this->product->clearMediaCollection('image');
            $this->product->addMedia($this->image)
                ->usingFileName($this->image->getClientOriginalName())
                ->toMediaCollection('image');
        }

        return redirect()->route('all-products')->with([
            'status' => 'success',
            'message' => 'Product updated successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.product-edit');
    }
}
