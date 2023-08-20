<?php

namespace App\Http\Livewire\User\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\Style;
use App\Models\UploadProductDesign;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsCategory extends Component
{
    public $category_id;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function mount($id) {
        $this->category_id = $id;

    }

    public function render()
    {
        return view('livewire.user.products.products-category', [
            'productDesigns' => ProductDesign::whereHas('product', function($query) {
                $query->where('category_id', $this->category_id);
            })->where('is_approved', 1)->get(),
            'categories' => Category::get(),
            'styles' => Style::get()
        ])->extends('layouts.app');
    }
}
