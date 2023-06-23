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
    public $weight;
    public $price;
    public $strikethrough_price;
    public $preorder;
    public $reseller_price;
    public $agent_price;
    public $agentsp_price;
    public $distribution_price;
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
            'weight' => $this->weight,
            'price' => $this->price,
            'strikethrough_price' => $this->strikethrough_price,
            'reseller_price' => $this->reseller_price,
            'agent_price' => $this->agent_price,
            'agentsp_price' => $this->agentsp_price,
            'distribution_price' => $this->distribution_price,
            'stock' => $this->stock,
            'status' => 1,
            'preorder' => $this->preorder
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
