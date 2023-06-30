<?php

namespace App\Http\Livewire\Landingpage;

use App\Models\Category;
use App\Models\DesignCategory;
use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\Slider;
use App\Models\Store;
use App\Models\UploadProductDesign;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.landingpage.index',[
            'categories' => Category::get(),
            'designCategories' => DesignCategory::get(),
            'uploadProductDesigns' => UploadProductDesign::where('is_approved', 1)->latest()->paginate(10),
            'sliders' => Slider::get(),
            'productDesigns' => ProductDesign::latest()->get(),
            'stores' => Store::latest()->get()
        ])->extends('layouts.app');
    }
}
