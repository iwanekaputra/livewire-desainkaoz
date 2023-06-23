<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProductsEdit extends Component
{
    use WithFileUploads;

    public $product_id;
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
    public $description;
    public $images = [];

    public function mount($id) {
        $product = Product::find($id);

        if($product) {
            $this->product_id = $product->id;
            $this->name = $product->name;
            $this->code = $product->code;
            $this->weight = $product->weight;
            $this->price = $product->price;
            $this->strikethrough_price = $product->strikethrough_price;
            $this->preorder = $product->preorder;
            $this->reseller_price = $product->reseller_price;
            $this->agent_price = $product->agent_price;
            $this->agentsp_price = $product->agentsp_price;
            $this->distribution_price = $product->distribution_price;
            $this->stock = $product->stock;
            $this->category_id = $product->category_id;
            $this->description = $product->description;
        }


    }


    public function update() {
        $product = Product::find($this->product_id);

        if($product) {
            $product->update([
                'category_id' => $this->category_id,
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

            if($this->images) {
                foreach ($this->images as $key => $image) {
                    $image->store('public/images');
                    Image::create([
                        'name' => $image->hashName(),
                        'product_id' => $this->product->id
                    ]);
                }
            }

            return redirect()->route('admin.products.index');
        }
    }

    public function deleteImage($id) {
        Image::where("id", $id)->delete();
    }

    public function render()
    {
        $productImages = Image::where('product_id', $this->product_id)->get();
        return view('livewire.admin.products.admin-products-edit',[
            'categories' => Category::get(),
            'productImages' => $productImages
        ])->extends('layouts.admin');
    }
}
