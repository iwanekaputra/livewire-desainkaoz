<?php

namespace App\Http\Livewire\User;

use App\Models\Cart;
use Livewire\Component;

class CartIndex extends Component
{
    public $cart_id;
    public $total_price;
    protected $listeners = [
        'remove' => 'deleteCart'
    ];

    public function mount() {
        $carts = Cart::where("user_id", auth()->user()->id)->get();

        foreach($carts as $cart) {
            $this->total_price += $cart->total_price;
        }
    }

    public function alertConfirm($id) {
        $this->cart_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Yakin dihapus?',
            'text' => '',
            'timer' => 3000,
            'action' => 'remove'
        ]);
    }

    public function deleteCart() {
        $cart = Cart::where('id', $this->cart_id)->first();
        $this->total_price -= $cart->total_price;
        $cart->delete();
        $this->emit('updateCart');
    }


    public function render()
    {
        $carts = Cart::where("user_id", auth()->user()->id)->get();

        return view('livewire.user.cart-index', [
            'carts' => $carts
        ])->extends('layouts.app');
    }
}
