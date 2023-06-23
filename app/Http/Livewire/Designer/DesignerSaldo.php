<?php

namespace App\Http\Livewire\Designer;

use Livewire\Component;

class DesignerSaldo extends Component
{
    public function render()
    {
        return view('livewire.designer.designer-saldo')->extends('layouts.designer');
    }
}
