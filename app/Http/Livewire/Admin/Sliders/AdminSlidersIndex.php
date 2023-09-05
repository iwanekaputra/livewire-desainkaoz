<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminSlidersIndex extends Component
{
    use WithFileUploads;

    public $image;
    public $slider_id;
    protected $listeners = [
        'remove' => 'destroy'
    ];

    public function store() {
        if($this->image) {
            $image_name=time().'-'.$this->image->getClientOriginalName();

            $res = $this->image->storeAs('banner',$image_name, 'custom_public_path');
            $img_path = asset('banner/'.$image_name);
        }

        Slider::create([
            'image' => $image_name ? $image_name : $this->image,
        ]);
    }

    public function alertConfirm($id)
    {
        $this->slider_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'If deleted, you will not be able to recover this imaginary file!',
                'action' => 'remove'
        ]);
    }

    public function destroy()
    {
        $slider = Slider::find($this->slider_id);
        $slider->delete();
    }

    public function render()
    {
        return view('livewire.admin.sliders.admin-sliders-index', [
            'sliders' => Slider::get()
        ])->extends('layouts.admin');
    }
}
