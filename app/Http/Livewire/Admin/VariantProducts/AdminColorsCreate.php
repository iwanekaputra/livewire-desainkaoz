<?php

namespace App\Http\Livewire\Admin\VariantProducts;

use App\Models\Color;
use Livewire\Component;

class AdminColorsCreate extends Component
{
    public $name;

    protected $listeners = [
        'moveToIndex'
    ];

    public function store() {
        Color::create([
            'name' => $this->name
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
        return view('livewire.admin.variant-products.admin-colors-create')->extends('layouts.admin');
    }
}
