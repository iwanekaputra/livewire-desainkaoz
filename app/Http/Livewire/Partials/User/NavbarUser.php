<?php

namespace App\Http\Livewire\Partials\User;

use App\Models\Cart;
use App\Models\Category;
use App\Models\DesignCategory;
use App\Models\Store;
use Livewire\Component;

class NavbarUser extends Component
{
    public $countCart;
    public $store;

    protected $listeners = [
        'updateCart',
        'designerStore'
    ];

    public function mount() {
        $this->store = Store::where('user_id', auth()->user()->id)->first();
    }

    public function updateCart() {
        // $this->countCart = Cart::where('user_id', auth()->user()->id)->count();
    }


    public function validateStore() {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'warning',
            'message' => 'Toko belum dibuat',
            'text' => 'Silahkan Daftar Toko Terlebih Dahulu',
            'timer' => 1000,
            'action' => 'designerStore'
        ]);

    }

    public function designerStore() {
        return redirect()->route('designer.store');
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
