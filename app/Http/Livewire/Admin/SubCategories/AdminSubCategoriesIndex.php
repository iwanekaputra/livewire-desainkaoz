<?php

namespace App\Http\Livewire\Admin\SubCategories;

use App\Models\SubCategory;
use Livewire\Component;

class AdminSubCategoriesIndex extends Component
{
    public $subCategoryId;
    public $name;

    protected $listeners = [
        'remove'
    ];

    
    public function store() {
        SubCategory::create([
            'name' => $this->name
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Berhasil tambah Sub Kategori',
            'text' => '',
            'timer' => 3000,
            'redirect' => 'moveToIndex'
        ]);
    }

    public function alertConfirm($id) {
        $this->subCategoryId = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'If deleted, you will not be able to recover this imaginary file!',
                'action' => 'remove'
        ]);
    }

    public function remove() {
        $subCategory = SubCategory::find($this->subCategoryId);

        $subCategory->delete();
    }

    public function render()
    {
        return view('livewire.admin.sub-categories.admin-sub-categories-index', [
            'subCategories' => SubCategory::get()
        ])->extends('layouts.admin');
    }
}
