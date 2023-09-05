<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class CustomDesign extends Component
{
    public function render()
    {
        return view('livewire.user.custom-design')->extends("layouts.app");
    }
}
