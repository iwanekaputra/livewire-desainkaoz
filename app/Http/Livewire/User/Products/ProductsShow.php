<?php

namespace App\Http\Livewire\User\Products;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\UploadProductDesign;
use App\Models\UploadProductDesignVariant;
use Livewire\Component;

class ProductsShow extends Component
{
    public $product_id;
    public $user_id;
    public $price;
    public $image;
    public $title;
    public $design;
    public $username;
    public $total_price;
    public $size;
    public $color;
    public $images;
    public $productDesign;

    public $countProduct;
    public $style = 'Lengan Pendek';
    public $productVariants;
    public $productId;

    public function mount($id) {
        $this->productId = $id;
        $product = UploadProductDesign::where('id', $id)->first();
        $this->productVariants = UploadProductDesignVariant::when($this->style, function($query, $style) {
            return $query->where('style', $style);
        })->where("upload_product_design_id", $id)->get();


        $this->user_id = $product->user_id;
        $this->price = $product->price;
        $this->username = $product->user->first_name;
        $this->product_id = $product->id;
        $this->image = $product->uploadProductDesignVariants[0]->image;
        $this->images = $product->uploadProductDesignVariants;
        $this->title = $product->title;
        $this->design = $product->designCategory->name;
        $this->total_price = $product->total_price;
        $this->productDesign = $product->productDesign->image;

        $this->countProduct = $this->getCountProduct();
    }

    public function updatedStyle() {
        $this->productVariants = UploadProductDesignVariant::where("upload_product_design_id", $this->productId)->when($this->style, function($query, $style) {
            return $query->where('style', $style);
        })->get();


        $this->image = $this->productVariants->first()->image;

    }


    public function addCart() {
        $findCart = Cart::where('upload_product_design_id', $this->product_id)->first();
        if($findCart) {
            $findCart->update([
                'quantity' => $findCart->quantity + 1,
                'total_price' => $findCart->uploadProductDesign->total_price * ($findCart->quantity + 1)
            ]);

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'Berhasil Update ke Keranjang!',
                'timer' => 3000
            ]);

            return;
        }

        $cart = Cart::create([
            'upload_product_design_id' => $this->product_id,
            'user_id' => auth()->user()->id,
            'size' => $this->size,
            'color' => $this->color,
            'total_price' => $this->total_price,
            'quantity' => 1
        ]);

        if($cart) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'Berhasil Tambah ke Keranjang!',
                'timer' => 3000
            ]);

            $this->emit('updateCart');
        }
    }

    public function addSize($size) {
        $this->size = $size;
    }

    public function addColor($color) {
        $this->color = $color;
    }

    public function getCountProduct() {
        return UploadProductDesign::where('user_id', $this->user_id)->count();
    }

    public function render()
    {
        return view('livewire.user.products.products-show')->extends('layouts.show-product');
    }
}
