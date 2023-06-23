<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class AdminCategoriesIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.categories.admin-categories-index', [
            'categories' => Category::get()
        ])->extends('layouts.admin');
    }
}
