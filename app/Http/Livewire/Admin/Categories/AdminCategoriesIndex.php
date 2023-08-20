<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminCategoriesIndex extends Component
{

    use WithFileUploads;

    public $category_id;
    public $name;
    public $icon;
    public $image;
    public $subCategoryId;
    protected $listeners = [
        'remove' => 'destroy'
    ];

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

    
    public function alertConfirm($id)
    {
        $this->category_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'If deleted, you will not be able to recover this imaginary file!',
                'action' => 'remove'
        ]);
    }

    public function destroy()
    {
        $category = Category::find($this->category_id);
        $category->delete();
    }
    

    public function render()
    {
        return view('livewire.admin.categories.admin-categories-index', [
            'categories' => Category::get(),
            'subCategories' => SubCategory::get()
        ])->extends('layouts.admin');
    }
}
