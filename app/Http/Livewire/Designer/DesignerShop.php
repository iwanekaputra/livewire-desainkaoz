<?php

namespace App\Http\Livewire\Designer;

use App\Models\Category;
use App\Models\DesignCategory;
use App\Models\ProductDesign;
use App\Models\Store;
use App\Models\UploadProductDesign;
use Livewire\Component;

class DesignerShop extends Component
{

    public $user_id;
    public $store;
    public $categoryProductId = 1;
    public $designCategoryId = 1;

    public function mount($id) {
        $this->user_id = $id;
        $this->store = Store::where("user_id", $this->user_id)->first();
    }


    public function render()
    {
        return view('livewire.designer.designer-shop', [
            'uploadProductDesigns' => UploadProductDesign::where("user_id", $this->user_id)->when($this->categoryProductId, function($query, $categoryProductId) {
                return $query->where("category_id", $categoryProductId);
            })->latest()->paginate(25),
            'productDesigns' => ProductDesign::where('user_id', $this->user_id)->when($this->designCategoryId, function($query, $design_category_id) {
                return $query->where('design_category_id', $design_category_id);
            })->latest()->paginate(25),
            'categories' => Category::get(),
            'designCategories' => DesignCategory::get()
        ])->extends('layouts.app');
    }
}
