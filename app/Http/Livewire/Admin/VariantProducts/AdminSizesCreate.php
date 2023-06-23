<?php

namespace App\Http\Livewire\Admin\VariantProducts;

use App\Models\Size;
use Livewire\Component;

class AdminSizesCreate extends Component
{
    public $number;

    protected $listeners = [
        'moveToIndex'
    ];

    public function store () {
        Size::create([
            'number' => $this->number
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'User Created Successfully!',
            'text' => 'It will list on users table soon.',
            'timer' => 3000,
            'redirect' => 'moveToIndex'
        ]);
    }

    public function moveToIndex() {
        redirect()->route('admin.variant.index');
    }

    public function render()
    {
        return view('livewire.admin.variant-products.admin-sizes-create')->extends('layouts.admin');
    }
}
