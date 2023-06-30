<?php

namespace App\Http\Livewire\Designer;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithFileUploads;

class DesignerStore extends Component
{
    use WithFileUploads;

    public $image;
    public $front;
    public $cover;
    public $name;
    public $url;
    public $description;
    public $store;

    public $image_update;
    public $cover_update;
    public $front_update;

    public function mount() {
        $this->store = Store::where("user_id", auth()->user()->id)->first();
        $this->name = optional($this->store)->name;
        $this->url = optional($this->store)->url;
        $this->description = optional($this->store)->description;
        $this->image = optional($this->store)->image;
        $this->cover = optional($this->store)->cover;
        $this->front = optional($this->store)->front_image;
    }

    public function store() {
        $image_name = '';
        $cover_name = '';
        $front_name = '';


        if($this->image_update) {
            $image_name=time().'-'.$this->image_update->getClientOriginalName();

            $res = $this->image_update->storeAs('images',$image_name, 'custom_public_path');
            $img_path = asset('uploads/images/'.$image_name);
        }

        if($this->cover_update) {
            $cover_name = time().'-'.$this->cover_update->getClientOriginalName();
            $res = $this->cover_update->storeAs('images',$cover_name, 'custom_public_path');
            $img_path = asset('uploads/images/'.$cover_name);
        }

        if($this->front_update) {
            $front_name = time().'-'.$this->front_update->getClientOriginalName();
            $res = $this->front_update->storeAs('images',$front_name, 'custom_public_path');
            $img_path = asset('uploads/images/'.$front_name);
        }

        if($this->store) {
            $this->store->update([
                'name' => $this->name,
                'url' => $this->url,
                'description' => $this->description,
                'image' => $image_name ? $image_name : $this->image,
                'cover' => $cover_name ? $cover_name : $this->cover,
                'front_image' => $front_name ? $front_name : $this->front
            ]);

            return $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'message' => 'Berhasil update toko',
                'text' => '',
                'timer' => 3000,
                'action' => ''
            ]);
        }

        Store::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'url' => $this->url,
            'description' => $this->description,
            'image' => $image_name,
            'cover' => $cover_name,
            'front_image' => $front_name
        ]);



        return $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Berhasil tambah toko',
            'text' => '',
            'timer' => 3000,
            'action' => ''
        ]);


    }

    public function render()
    {
        return view('livewire.designer.designer-store')->extends('layouts.designer');
    }
}
