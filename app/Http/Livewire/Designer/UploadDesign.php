<?php

namespace App\Http\Livewire\Designer;

use App\Models\DesignCategory;
use App\Models\ImageDesign;
use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\UploadProductDesign;
use App\Models\UploadProductDesignVariant;
use App\Models\User;
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
    public $style;
    public $angka;

    public $isAddDesign = false;
    public $imgDesign;
    public $link;

    protected $listeners = [
        'submitForm',
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
                    'is_approved' => '0'
                ]);

                $this->isAddDesign = true;
            }


            $productDesign = ProductDesign::create([
                'image_design_id' => $this->imgDesign->id,
                'product_id' => $data['productId'],
                'user_id' => auth()->user()->id,
                'price_design' => $data['price'],
                'product_variant_id' => $data['imageDefaultColor'],
                'sumbu_y' => $data['sumbu_y'],
                'sumbu_x' => $data['sumbu_x'],
                'rotation' => $data['rotation'],
                'width' => $data['width'],
                'height' => $data['height'],
                'is_approved' => '0'
            ]);

            if($productDesign) {
                redirect()->route('designer.design');
            }
        }

        // $createTshirt = UploadProductDesign::create([
        //     'category_id' => 1,
        //     'product_design_id' => $productDesign->id,
        //     'title' => $data['title'],
        //     'design_category_id' => $data['designCategoryId'],
        //     'tags' => $data['tags'],
        //     'description' => $data['description'],
        //     'url' => $data['url'],
        //     'price_design' => $data['priceTshirt'],
        //     'is_approved' => 0,
        //     'total_price' => 100000 + (int) $data['priceTshirt'],
        //     'user_id' => auth()->user()->id
        // ]);

        // if($data['tshirt']) {
        //     foreach($data['tshirt'] as $tshirt) {
        //         UploadProductDesignVariant::create([
        //             'color' => $tshirt[0],
        //             'style' => $tshirt[1],
        //             'upload_product_design_id' => $createTshirt->id,
        //             'image' => $tshirt[2]
        //         ]);
        //     }
        // }

        redirect()->route('designer.design');
    }
}
