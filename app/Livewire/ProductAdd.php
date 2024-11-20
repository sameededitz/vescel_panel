<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductAdd extends Component
{
    use WithFileUploads;

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
            'image' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif',
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

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function removeImage()
    {
        $this->image = null;
    }

    public function updatedCategory($value)
    {
        // Fetch subcategories for the selected category
        $this->subCategories = SubCategory::where('category_id', $value)->get();
    }

    public function submit()
    {
        $this->validate();
        $product = Product::create([
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
            $product->addMedia($this->image)
                ->usingFileName($this->image->getClientOriginalName())
                ->toMediaCollection('image');
        }

        return redirect()->route('all-products')->with([
            'status' => 'success',
            'message' => 'Product added successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.product-add');
    }
}
