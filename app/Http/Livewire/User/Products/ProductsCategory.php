<?php

namespace App\Http\Livewire\User\Products;

use App\Models\Category;
use App\Models\Product;
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
            'products' => UploadProductDesign::where('category_id', $this->category_id)->where('is_approved', 1)->paginate(25),
            'categories' => Category::get(),
            'styles' => Style::get()
        ])->extends('layouts.app');
    }
}
