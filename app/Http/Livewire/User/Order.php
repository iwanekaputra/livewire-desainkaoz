<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Order extends Component
{
    public function render()
    {
        return view('livewire.user.order')->extends('layouts.app');
    }
}
