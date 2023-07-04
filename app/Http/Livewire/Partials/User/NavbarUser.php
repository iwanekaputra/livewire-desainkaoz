<?php

namespace App\Http\Livewire\Partials\User;

use App\Models\Cart;
use App\Models\Category;
use App\Models\DesignCategory;
use Livewire\Component;

class NavbarUser extends Component
{
    public $countCart;

    protected $listeners = [
        'updateCart'
    ];

    public function mount() {
        // $this->countCart = Cart::where('user_id', auth()->user()->id)->count();
    }

    public function updateCart() {
        // $this->countCart = Cart::where('user_id', auth()->user()->id)->count();
    }

    public function render()
    {
        return view('livewire.partials.user.navbar-user', [
            'designCategories' => DesignCategory::get(),
            'appareals' => Category::where('sub_category_id', 1)->get(),
            'accesories' => Category::where('sub_category_id', 2)->get(),
            'kids' => Category::where('sub_category_id', 3)->get()
        ])->extends('layouts.app');
    }
}
