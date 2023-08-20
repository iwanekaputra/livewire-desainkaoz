<?php

namespace App\Http\Livewire\Partials\Admin;

use Livewire\Component;

class NavbarAdmin extends Component
{
    public function render()
    {
        return view('livewire.partials.admin.navbar-admin')->extends('layouts.admin');
    }
}
