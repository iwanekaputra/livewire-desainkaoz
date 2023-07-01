<?php

namespace App\Http\Livewire\Designer;

use App\Models\DesignCategory;
use App\Models\ProductDesign;
use App\Models\UploadProductDesign;
use App\Models\UploadProductDesignVariant;
use Livewire\Component;
use Livewire\WithFileUploads;

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

    protected $listeners = [
        'tes',
        'change',
        'stepBack'
    ];

    public function render()
    {
        return view('livewire.designer.upload-design', [
            'designCategories' => DesignCategory::get()
        ])->extends('layouts.app');
    }


    public function changeStep($step) {
        $this->step = $step;
    }

    public function tes($data) {
        $this->step = 2;
        $this->base = $data;
    }

    public function change() {
        $this->step = 3;
    }

    public function stepChange() {
        $this->step = 3;
    }

    public function stepBack() {
        $this->step = 1;
    }

    public function submitForm() {

        if($this->imageDesign) {
            $image_name=time().'-'.$this->imageDesign->getClientOriginalName();

            $res = $this->imageDesign->storeAs('design',$image_name, 'custom_public_path');
            $img_path = asset('uploads/design/'.$image_name);

            $productDesign = ProductDesign::create([
                'design_category_id' => $this->design_category_id,
                'category_id' => 1,
                'user_id' => auth()->user()->id,
                'title' => $this->title,
                'tags' => $this->tags,
                'image' => $image_name,
                'description' => $this->description,
                'price' => $this->priceTshirt
            ]);
        }

        $createTshirt = UploadProductDesign::create([
            'category_id' => 1,
            'product_design_id' => $productDesign->id,
            'title' => $this->title,
            'design_category_id' => $this->design_category_id,
            'tags' => $this->tags,
            'description' => $this->description,
            'url' => $this->url,
            'price_design' => $this->priceTshirt,
            'is_approved' => 0,
            'total_price' => 100000 + $this->priceTshirt,
            'user_id' => auth()->user()->id
        ]);

        if($this->base['tshirt']) {
            foreach($this->base['tshirt'] as $base) {
                UploadProductDesignVariant::create([
                    'color' => $base[0],
                    'upload_product_design_id' => $createTshirt->id,
                    'image' => $base[1]
                ]);
            }
        }


        $createHoodie = UploadProductDesign::create([
            'category_id' => 2,
            'product_design_id' => $productDesign->id,
            'title' => $this->title,
            'design_category_id' => $this->design_category_id,
            'tags' => $this->tags,
            'description' => $this->description,
            'url' => $this->url,
            'price_design' => $this->priceHoodie,
            'is_approved' => 0,
            'total_price' => 200000 + $this->priceHoodie,
            'user_id' => auth()->user()->id
        ]);

        if($this->base['hoodie']) {
            foreach($this->base['hoodie'] as $base) {
                UploadProductDesignVariant::create([
                    'color' => $base[0],
                    'upload_product_design_id' => $createHoodie->id,
                    'image' => $base[1]
                ]);
            }
        }


        $createSweater = UploadProductDesign::create([
            'category_id' => 3,
            'product_design_id' => $productDesign->id,
            'title' => $this->title,
            'design_category_id' => $this->design_category_id,
            'tags' => $this->tags,
            'description' => $this->description,
            'url' => $this->url,
            'price_design' => $this->priceSweater,
            'is_approved' => 0,
            'total_price' => 150000 + $this->priceSweater,
            'user_id' => auth()->user()->id
        ]);

        if($this->base['sweater']) {
            foreach($this->base['sweater'] as $base) {
                UploadProductDesignVariant::create([
                    'color' => $base[0],
                    'upload_product_design_id' => $createSweater->id,
                    'image' => $base[1]
                ]);
            }
        }

        $createHat = UploadProductDesign::create([
            'category_id' => 4,
            'product_design_id' => $productDesign->id,
            'title' => $this->title,
            'design_category_id' => $this->design_category_id,
            'tags' => $this->tags,
            'description' => $this->description,
            'url' => $this->url,
            'price_design' => $this->priceHat,
            'is_approved' => 0,
            'total_price' => 50000 + $this->priceHat,
            'user_id' => auth()->user()->id
        ]);

        if($this->base['hat']) {
            foreach($this->base['hat'] as $base) {
                UploadProductDesignVariant::create([
                    'color' => $base[0],
                    'upload_product_design_id' => $createHat->id,
                    'image' => $base[1]
                ]);
            }
        }

        $createBag = UploadProductDesign::create([
            'category_id' => 4,
            'product_design_id' => $productDesign->id,
            'title' => $this->title,
            'design_category_id' => $this->design_category_id,
            'tags' => $this->tags,
            'description' => $this->description,
            'url' => $this->url,
            'price_design' => $this->priceBag,
            'is_approved' => 0,
            'total_price' => 20000 + $this->priceBag,
            'user_id' => auth()->user()->id
        ]);

        if($this->base['bag']) {
            foreach($this->base['bag'] as $base) {
                UploadProductDesignVariant::create([
                    'color' => $base[0],
                    'upload_product_design_id' => $createBag->id,
                    'image' => $base[1]
                ]);
            }
        }


        // UploadProductDesign::create([
        //     'category_id' => 2,
        //     'title' => $this->title,
        //     'design_category_id' => $this->design_category_id,
        //     'image' => $this->base['hoodie'],
        //     'tags' => $this->tags,
        //     'description' => $this->description,
        //     'url' => $this->url,
        //     'price_design' => $this->priceHoodie,
        //     'is_approved' => 0,
        //     'total_price' => 100000 + $this->priceHoodie,
        //     'user_id' => auth()->user()->id
        // ]);

        // UploadProductDesign::create([
        //     'category_id' => 3,
        //     'title' => $this->title,
        //     'design_category_id' => $this->design_category_id,
        //     'image' => $this->base['sweater'],
        //     'tags' => $this->tags,
        //     'description' => $this->description,
        //     'url' => $this->url,
        //     'price_design' => $this->priceSweater,
        //     'is_approved' => 0,
        //     'total_price' => 100000 + $this->priceSweater,
        //     'user_id' => auth()->user()->id
        // ]);

        // UploadProductDesign::create([
        //     'category_id' => 4,
        //     'title' => $this->title,
        //     'design_category_id' => $this->design_category_id,
        //     'image' => $this->base['hat'],
        //     'tags' => $this->tags,
        //     'description' => $this->description,
        //     'url' => $this->url,
        //     'price_design' => $this->priceHat,
        //     'is_approved' => 0,
        //     'total_price' => 100000 + $this->priceHat,
        //     'user_id' => auth()->user()->id
        // ]);

        // UploadProductDesign::create([
        //     'category_id' => 5,
        //     'title' => $this->title,
        //     'design_category_id' => $this->design_category_id,
        //     'image' => $this->base['bag'],
        //     'tags' => $this->tags,
        //     'description' => $this->description,
        //     'url' => $this->url,
        //     'price_design' => $this->priceBag,
        //     'is_approved' => 0,
        //     'total_price' => 100000 + $this->priceBag,
        //     'user_id' => auth()->user()->id
        // ]);



        redirect()->route('designer.design');
    }
}
