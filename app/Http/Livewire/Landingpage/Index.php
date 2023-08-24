<?php

namespace App\Http\Livewire\Landingpage;

use App\Models\Category;
use App\Models\DesignCategory;
use App\Models\ImageDesign;
use App\Models\ProductDesign;
use App\Models\Slider;
use App\Models\Store;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.landingpage.index',[
            'categories' => Category::get(),
            'designCategories' => DesignCategory::get(),
            'sliders' => Slider::get(),
            'productDesigns' => ProductDesign::latest()->where('is_approved', 1)->paginate(10),
            'imageDesigns' => ImageDesign::latest()->where('is_approved', 1)->paginate(10),
            'stores' => Store::latest()->get()
        ])->extends('layouts.app');
    }
}
