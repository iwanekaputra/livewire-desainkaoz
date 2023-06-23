<?php

namespace App\Http\Livewire\Designer;

use App\Models\DesignCategory;
use App\Models\ProductDesign;
use App\Models\UploadProductDesign;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadDesign extends Component
{
    use WithFileUploads;

    public $step = 1;
    public $base;
    public $title;
    public $description;
    public $design_category_id;
    public $tags;
    public $url;
    public $price;
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
        UploadProductDesign::create([
            'category_id' => 1,
            'title' => $this->title,
            'design_category_id' => $this->design_category_id,
            'image' => $this->base,
            'tags' => $this->tags,
            'description' => $this->description,
            'url' => $this->url,
            'price_design' => $this->price,
            'is_approved' => 0,
            'total_price' => 100000 + $this->price,
            'user_id' => auth()->user()->id
        ]);

        if($this->imageDesign) {
            $image_name=time().'-'.$this->imageDesign->getClientOriginalName();

            $res = $this->imageDesign->storeAs('design',$image_name, 'custom_public_path');
            $img_path = asset('uploads/design/'.$image_name);

            ProductDesign::create([
                'design_category_id' => $this->design_category_id,
                'category_id' => 1,
                'user_id' => auth()->user()->id,
                'title' => $this->title,
                'tags' => $this->tags,
                'image' => $image_name,
                'description' => $this->description,
                'price' => $this->price
            ]);
        }

        redirect()->route('designer.design');
    }
}
