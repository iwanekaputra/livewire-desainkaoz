<?php

namespace App\Http\Livewire\Designer;

use App\Models\DesignCategory;
use App\Models\ImageDesign;
use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\ProductDesignVariant;
use App\Models\UploadProductDesign;
use App\Models\UploadProductDesignVariant;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use illuminate\Support\Str;

class UploadDesign extends Component
{
    use WithFileUploads;

    public $step = 1;
    public $base = [];
    public $title;
    public $description;
    public $design_category_id;
    public $tags;
    public $url;
    public $priceTshirt;
    public $priceHoodie;
    public $priceSweater;
    public $priceHat;
    public $priceBag;
    public $imageDesign;
    public $imageDesignBack;

    public $style;
    public $angka;

    public $isAddDesign = false;
    public $isAddDesignBack = false;

    public $imgDesign;
    public $imgDesignBack;

    public $link;
    public $product_design_id;

    protected $listeners = [
        'submitForm',
        'submitFormBack',
        'change',
        'stepBack'
    ];

    public function mount() {
        $this->link = User::find(auth()->user()->id);

    }

    public function render()
    {
        return view('livewire.designer.upload-design', [
            'designCategories' => DesignCategory::get(),
            'products' => Product::get()
        ])->extends('layouts.app');
    }


    public function submitForm($data) {
        if($this->imageDesign) {
            if(!$this->isAddDesign) {
                $image_name=time().'-'.$this->imageDesign->getClientOriginalName();

                $res = $this->imageDesign->storeAs('design',$image_name, 'custom_public_path');
                $img_path = asset('uploads/design/'.$image_name);

                $this->imgDesign = ImageDesign::create([
                    'user_id' => auth()->user()->id,
                    'design_category_id' => $data['designCategoryId'],
                    'title' => $data['title'],
                    'tags' => $data['tags'],
                    'image' => $image_name,
                    'description' => $data['description'],
                    'view' => 'front',
                    'is_approved' => '0'
                ]);

                $this->isAddDesign = true;
            }


            $productDesign = ProductDesign::create([
                'image_design_id' => $this->imgDesign->id,
                'product_id' => $data['productId'],
                'slug' => Str::slug($data['slug']),
                'user_id' => auth()->user()->id,
                'price_design' => $data['price'],
                'product_variant_id' => $data['imageDefaultColor'],
                'sumbu_y' => $data['sumbu_y'],
                'view' => 'front',
                'sumbu_x' => $data['sumbu_x'],
                'rotation' => $data['rotation'],
                'width' => $data['width'],
                'height' => $data['height'],
                'is_approved' => '0'
            ]);

            $this->product_design_id = $productDesign->id;

            $productDesign->update([
                'slug' => $productDesign->slug . '-' . $productDesign->id
            ]);

            if($productDesign) {
                redirect()->route('designer.design');
            }
        }

        redirect()->route('designer.design');
    }

    public function submitFormBack($data) {
        if($this->imageDesignBack) {
            if(!$this->isAddDesignBack) {
                $image_name=time().'-'.$this->imageDesignBack->getClientOriginalName();

                $res = $this->imageDesignBack->storeAs('design',$image_name, 'custom_public_path');
                $img_path = asset('uploads/design/'.$image_name);

                $this->imgDesignBack = ImageDesign::create([
                    'user_id' => auth()->user()->id,
                    'design_category_id' => $data['designCategoryId'],
                    'title' => $data['title'],
                    'tags' => $data['tags'],
                    'image' => $image_name,
                    'description' => $data['description'],
                    'view' => 'back',
                    'is_approved' => '0'
                ]);

                $this->isAddDesignBack = true;
            }

            $productDesign = ProductDesignVariant::create([
                'product_design_id' => $this->product_design_id,
                'image_design_id' => $this->imgDesignBack->id,
                'product_id' => $data['productId'],
                'user_id' => auth()->user()->id,
                // 'price_design' => $data['price'],
                'sumbu_y' => $data['sumbu_y'],
                'view' => 'Back',
                'sumbu_x' => $data['sumbu_x'],
                'rotation' => $data['rotation'],
                'width' => $data['width'],
                'height' => $data['height'],
                'is_approved' => '0'
            ]);

            // $productDesign->update([
            //     'slug' => $productDesign->slug . '-' . $productDesign->id
            // ]);

            if($productDesign) {
                redirect()->route('designer.design');
            }
        }

        redirect()->route('designer.design');
    }
}
