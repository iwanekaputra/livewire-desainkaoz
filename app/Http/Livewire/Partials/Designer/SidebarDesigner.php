<?php

namespace App\Http\Livewire\Partials\Designer;


use Livewire\Component;

class SidebarDesigner extends Component
{
    public function render()
    {
        return view('livewire.partials.designer.sidebar-designer')->extends('layouts.app');
    }
}
