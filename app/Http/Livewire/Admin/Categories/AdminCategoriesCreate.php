<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCategoriesCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $icon;
    public $image;
    public $subCategoryId;

    public function store() {
        if($this->icon) {
            $this->icon->store('public/produk');
        }

        if($this->image) {
            $this->icon->store('public/produk');
        }

        Category::create([
            'name' => $this->name,
            'slug' => $this->name,
            'icon' => $this->icon->hashName(),
            'image' => $this->image->hashName(),
            'sub_category_id' => $this->subCategoryId
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Berhasil tambah Kategori',
            'text' => '',
            'timer' => 3000,
            'redirect' => 'moveToIndex'
        ]);
    }

    public function moveToIndex() {
        return redirect()->route('admin.categories.index');
    }

    public function render()
    {
        return view('livewire.admin.categories.admin-categories-create', [
            'subCategories' => SubCategory::get()
        ])->extends('layouts.admin');
    }
}
