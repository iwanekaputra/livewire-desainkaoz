<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;

class AdminSliderController extends Component
{
    public $slider_id;

    protected $listeners = [
        'remove'
    ];

    public function alertConfirm($id) {
        $this->slider_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
    }

    public function remove () {
        $slider = Slider::find($this->slider_id);
        $slider->delete();
    }

    public function render()
    {
        return view('livewire.admin.admin-slider-controller', [
            'sliders' => Slider::get()
        ])->extends('layouts.admin');
    }
}
