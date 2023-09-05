<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Image;
use App\Models\Color;
use App\Models\Product;
use App\Models\Style;
use App\Models\Size;
use App\Models\ProductVariant;
use App\Models\ProductSize;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProductsEdit extends Component
{
    use WithFileUploads;

    public $product_id;
    public $name;
    public $code;
    public $price;
    public $price_sablon_belakang;
    public $category_id;
    public $description;
    public $imageProductVariant;
    public $color;
    public $size;
    public $view;
    public $style_id;

    public $product;
    public $productvariant;
    public $productvariant_id;

    public $sizes_id = [];
    public $images = [];
    protected $listeners = [
        'remove' => 'destroy'
    ];
    public function mount($id) {


        $product = Product::find($id);

        if($product) {
            $this->product_id = $product->id;
            $this->name = $product->name;
            $this->code = $product->code;
            $this->price = $product->price;
            $this->price_sablon_belakang = $product->price_sablon_belakang;
            $this->category_id = $product->category_id;
            $this->description = $product->description;
        }
        $this->product = $product;

    }

    public function update() {
        $product = Product::find($this->product_id);

        if($product) {
            $product->update([
                'category_id' => $this->category_id,
                'name' => $this->name,
                'code' => $this->code,
                'description' => $this->description,
                'price' => $this->price,
                'price_sablon_belakang' => $this->price_sablon_belakang,
                'status' => 1,
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

            ProductVariant::where('product_id', $this->product_id)->update([
                'price' => $this->price
    
            ]);

            foreach($this->sizes_id as $size) {
            ProductSize::create([
                'product_id' => $product->id,
                'number' => $size
            ]);
        }

          

            return redirect()->route('admin.products.edit', $product->id);
        }
    }

    public function createproductvariant(){
        $product = Product::find($this->product_id);

        if($this->imageProductVariant) {
            $image_name=time().'-'.$this->imageProductVariant->getClientOriginalName();
    
                $res = $this->imageProductVariant->storeAs('imageProductVariant',$image_name, 'custom_public_path');
                $img_path = asset('products/'.$image_name);

            ProductVariant::create([
                'product_id' => $product->id,
                'code'       => $this->code,
                'view'       => $this->view,
                'price'      => $this->price,
                'style_id'   => $this->style_id,
                'color'      => $this->color,
                'image'      => $image_name ? $image_name : $this->image
            ]);

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'Berhasil tambah Varian product',
                'text' => '',
                'timer' => 3000,
            ]);
        }
        return redirect()->route('admin.products.edit', $product->id);

    }

    public function deleteImage($id) {
        Image::where("id", $id)->delete();
    }

    public function alertConfirm($id)
    {
        $this->productvariant_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'If deleted, you will not be able to recover this imaginary file!',
                'action' => 'remove'
        ]);
    }


    public function destroy()
    {
        $productvariant = ProductVariant::find($this->productvariant_id);
        $productvariant->delete();
    }

    public function render()
    {
        $productvarians = ProductVariant::where('product_id', $this->product_id)->get();
        $productImages = Image::where('product_id', $this->product_id)->get();
        return view('livewire.admin.products.admin-products-edit',[
            'categories' => Category::get(),
            'colors' => Color::get(),
            'styles' => Style::get(),
            'productvariants' => $productvarians,
            'productImages' => $productImages,
            'sizes' => Size::get(),
            'productsize' => ProductSize::where('product_id', $this->product_id)->get()
        ])->extends('layouts.admin');
    }
}
