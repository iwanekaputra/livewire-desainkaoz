<?php

namespace App\Http\Livewire\Admin\VariantProducts;

use App\Models\Color;
use Livewire\Component;

class AdminColorsIndex extends Component
{
    public $color_id;
    public $name;


    protected $listeners = [
        'removeColor',
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

    public function alertConfirm($id) {
        $this->color_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!',
            'action' => 'removeColor'
        ]);
    }

    public function removeColor() {
        $color = Color::find($this->color_id);
        $color->delete();
    }

    public function render()
    {
        return view('livewire.admin.variant-products.admin-colors-index', [
            'colors' => Color::get(),
        ])->extends("layouts.admin");
    }
}
