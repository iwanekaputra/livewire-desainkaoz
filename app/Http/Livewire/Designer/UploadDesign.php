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
        'submitForm',
        'change',
        'stepBack'
    ];

    public function render()
    {
        return view('livewire.designer.upload-design', [
            'designCategories' => DesignCategory::get()
        ])->extends('layouts.app');
    }




    public function submitForm($data) {
        if($this->imageDesign) {
            $image_name=time().'-'.$this->imageDesign->getClientOriginalName();

            $res = $this->imageDesign->storeAs('design',$image_name, 'custom_public_path');
            $img_path = asset('uploads/design/'.$image_name);

            $productDesign = ProductDesign::create([
                'design_category_id' => $data['designCategoryId'],
                'category_id' => 1,
                'user_id' => auth()->user()->id,
                'title' => $data['title'],
                'tags' => $data['tags'],
                'image' => $image_name,
                'description' => $data['description'],
                'price' => $data['priceTshirt']
            ]);
        }

        $createTshirt = UploadProductDesign::create([
            'category_id' => 1,
            'product_design_id' => $productDesign->id,
            'title' => $data['title'],
            'design_category_id' => $data['designCategoryId'],
            'tags' => $data['tags'],
            'description' => $data['description'],
            'url' => $data['url'],
            'price_design' => $data['priceTshirt'],
            'is_approved' => 0,
            'total_price' => 100000 + $data['priceTshirt'],
            'user_id' => auth()->user()->id
        ]);

        if($data['tshirt']) {
            foreach($data['tshirt'] as $tshirt) {
                UploadProductDesignVariant::create([
                    'color' => $tshirt[0],
                    'upload_product_design_id' => $createTshirt->id,
                    'image' => $tshirt[1]
                ]);
            }
        }


        $createHoodie = UploadProductDesign::create([
            'category_id' => 2,
            'product_design_id' => $productDesign->id,
            'title' => $data['title'],
            'design_category_id' => $data['designCategoryId'],
            'tags' => $data['tags'],
            'description' => $data['description'],
            'url' => $data['url'],
            'price_design' => $data['priceHoodie'],
            'is_approved' => 0,
            'total_price' => 200000 + $data['priceHoodie'],
            'user_id' => auth()->user()->id
        ]);

        if($data['hoodie']) {
            foreach($data['hoodie'] as $hoodie) {
                UploadProductDesignVariant::create([
                    'color' => $hoodie[0],
                    'upload_product_design_id' => $createHoodie->id,
                    'image' => $hoodie[1]
                ]);
            }
        }


        $createSweater = UploadProductDesign::create([
            'category_id' => 3,
            'product_design_id' => $productDesign->id,
            'title' => $data['title'],
            'design_category_id' => $data['designCategoryId'],
            'tags' => $data['tags'],
            'description' => $data['description'],
            'url' => $data['url'],
            'price_design' => $data['priceSweater'],
            'is_approved' => 0,
            'total_price' => 150000 + $data['priceSweater'],
            'user_id' => auth()->user()->id
        ]);

        if($data['sweater']) {
            foreach($data['sweater'] as $sweater) {
                UploadProductDesignVariant::create([
                    'color' => $sweater[0],
                    'upload_product_design_id' => $createSweater->id,
                    'image' => $sweater[1]
                ]);
            }
        }

        $createHat = UploadProductDesign::create([
            'category_id' => 4,
            'product_design_id' => $productDesign->id,
            'title' => $data['title'],
            'design_category_id' => $data['designCategoryId'],
            'tags' => $data['tags'],
            'description' => $data['description'],
            'url' => $data['url'],
            'price_design' => $data['priceHat'],
            'is_approved' => 0,
            'total_price' => 50000 + $data['priceHat'],
            'user_id' => auth()->user()->id
        ]);

        if($data['hat']) {
            foreach($data['hat'] as $hat) {
                UploadProductDesignVariant::create([
                    'color' => $hat[0],
                    'upload_product_design_id' => $createHat->id,
                    'image' => $hat[1]
                ]);
            }
        }

        $createBag = UploadProductDesign::create([
            'category_id' => 4,
            'product_design_id' => $productDesign->id,
            'title' => $data['title'],
            'design_category_id' => $data['designCategoryId'],
            'tags' => $data['tags'],
            'description' => $data['description'],
            'url' => $data['url'],
            'price_design' => $data['priceBag'],
            'is_approved' => 0,
            'total_price' => 20000 + $data['priceBag'],
            'user_id' => auth()->user()->id
        ]);

        if($data['bag']) {
            foreach($data['bag'] as $bag) {
                UploadProductDesignVariant::create([
                    'color' => $bag[0],
                    'upload_product_design_id' => $createBag->id,
                    'image' => $bag[1]
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
