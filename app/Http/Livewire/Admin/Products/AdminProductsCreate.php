<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Size;
use App\Models\Style;
use Livewire\Component;
use Livewire\WithFileUploads;


class AdminProductsCreate extends Component
{
    use WithFileUploads;


    public $name;
    public $code;
    public $price;
    public $size;
    public $stock;
    public $category_id;
    public $style_id;
    public $description;
    public $images = [];
    public $sizes_id = [];
    public $color_id = [];
    public $imageProductVariant;
    public $color;


    public function store() {

        $product = Product::create([
            'category_id' => $this->category_id,
            'style_id' => $this->style_id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'size' => $this->size,
            'status' => 1,
        ]);

        foreach($this->sizes_id as $size) {
            ProductSize::create([
                'product_id' => $product->id,
                'number' => $size
            ]);
        }


        if($this->images) {
            foreach ($this->images as $key => $image) {
                $image->store('public/images');
                Image::create([
                    'name' => $image->hashName(),
                    'product_id' => $product->id
                ]);
            }
        }

        if($this->imageProductVariant) {
            $this->imageProductVariant->store('public/images');

            ProductVariant::create([
                'product_id' => $product->id,
                'code' => $this->code,
                'color' => $this->color,
                'image' => $this->imageProductVariant->hashName()
            ]);
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'User Created Successfully!',
            'text' => 'It will list on users table soon.',
            'timer' => 3000
        ]);

        return redirect()->route("admin.products.index");
    }

    public function render()
    {
        return view('livewire.admin.products.admin-products-create', [
            'categories' => Category::get(),
            'colors' => Color::get(),
            'styles' => Style::get(),
            'sizes' => Size::get()
        ])->extends('layouts.admin');
    }
}
