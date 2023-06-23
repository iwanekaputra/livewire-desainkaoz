<?php

namespace App\Http\Livewire\Designer;

use Livewire\Component;

class DesignerDashboard extends Component
{
    public function render()
    {
        return view('livewire.designer.designer-dashboard')->extends('layouts.designer');
    }
}
