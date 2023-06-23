<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminSlidersCreate extends Component
{
    use WithFileUploads;

    public $image;


    public function store() {
        $this->image->store('public/banner');
        Slider::create([
            'image' => $this->image->hashName()
        ]);
    }

    public function render()
    {
        return view('livewire.admin.sliders.admin-sliders-create')->extends('layouts.admin');
    }
}
