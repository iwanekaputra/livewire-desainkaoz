<?php

namespace App\Http\Livewire\User;

use App\Models\Transaction;
use Livewire\Component;

class Order extends Component
{

    public function mount(){

    }

    public function render()
    {
        return view('livewire.user.order', [
            'transactions' => Transaction::where('user_id', auth()->user()->id)->get()
        ])->extends('layouts.app');
    }
}
