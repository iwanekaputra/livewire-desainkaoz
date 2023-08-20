<?php

namespace App\Http\Livewire\Admin\CategoriesDesign;

use App\Models\DesignCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCategoriesDesignIndex extends Component
{
    use WithFileUploads;

    public $categorydesign_id;
    public $name;
    public $slug;
    public $icon;
    public $image;

    public function save() {

        
        if($this->icon) {
            $image_name=time().'-'.$this->icon->getClientOriginalName();

            $res = $this->icon->storeAs('icon',$image_name, 'custom_public_path');
            $img_path = asset('uploads/icon/'.$image_name);
        }

        if($this->image) {
            $image_name=time().'-'.$this->image->getClientOriginalName();

            $res = $this->image->storeAs('image',$image_name, 'custom_public_path');
            $img_path = asset('uploads/image/'.$image_name);
        }

        DesignCategory::create([
            'name' => $this->name,
            'slug' => $this->name,
            'icon' => $image_name ? $image_name : $this->icon,
            'image' => $image_name ? $image_name : $this->image,
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Berhasil tambah Kategori',
            'text' => '',
            'timer' => 3000,
            'redirect' => 'moveToIndex'
        ]);
    }

    
    public function alertConfirm($id)
    {
        $this->categorydesign_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'If deleted, you will not be able to recover this imaginary file!',
                'action' => 'remove'
        ]);
    }
    protected $listeners = [
        'remove' => 'destroy'
    ];

    public function destroy()
    {
        $categorydesign_id = DesignCategory::find($this->categorydesign_id);
        $categorydesign_id->delete();
    }
    
    public function render()
    {
        return view('livewire.admin.categories-design.admin-categories-design-index', 
        [
            'designcategory' => DesignCategory::get(),
        ]
        )->extends('layouts.admin');
    }
}
