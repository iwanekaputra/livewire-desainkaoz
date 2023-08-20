<?php

namespace App\Http\Livewire\User\ProductsDesign;

use App\Http\Livewire\User\Products\ProductsCategory;
use App\Models\DesignCategory;
use App\Models\ImageDesign;
use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\UploadProductDesign;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsDesignCategory extends Component
{
    use WithPagination;

    public $productDesignId;
    public $countProductDesign;

    public function mount($id) {
        $this->productDesignId = $id;
        $this->countProductDesign = $this->getCountProductDesign();
    }

    public function getCountProductDesign() {
        return ProductDesign::count();
    }

    public function render()
    {
        return view('livewire.user.products-design.products-design-category', [
            'productDesigns' => ImageDesign::where('design_category_id', $this->productDesignId)->paginate(25),
            'designCategories' => DesignCategory::get()
        ])->extends('layouts.app');
    }
}
