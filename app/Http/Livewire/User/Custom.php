<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Custom extends Component
{
    public function render()
    {
        return view('livewire.user.custom')->extends("layouts.app");
    }
}
