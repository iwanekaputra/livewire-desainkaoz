<?php

namespace App\Http\Livewire\Admin\SubCategories;

use App\Models\SubCategory;
use Livewire\Component;

class AdminSubCategoriesCreate extends Component
{
    public $name;

    protected $listeners = [
        'moveToIndex'
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

    public function moveToIndex() {
        redirect()->route('admin.sub-categories.index');
    }

    public function render()
    {
        return view('livewire.admin.sub-categories.admin-sub-categories-create')->extends('layouts.admin');
    }
}
