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
    public $style;

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
                'price' => (int) $data['price'],
                'width' => $data['width'],
                'height' => $data['height'],
                'sumbu_x' => $data['sumbu_x'],
                'sumbu_y' => $data['sumbu_y']
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
