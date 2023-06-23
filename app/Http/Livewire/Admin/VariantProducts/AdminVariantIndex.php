<?php

namespace App\Http\Livewire\Admin\VariantProducts;

use App\Models\Color;
use App\Models\Size;
use App\Models\Style;
use Livewire\Component;

class AdminVariantIndex extends Component
{
    public $color_id;
    public $size_id;

    protected $listeners = [
        'removeColor',
        'removeSize'
    ];

    public function alertConfirmDeleteColor($id) {
        $this->color_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!',
            'action' => 'removeColor'
        ]);
    }

    public function alertConfirmDeleteSize($id) {
        $this->size_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!',
            'action' => 'removeSize'
        ]);
    }

    public function removeColor() {
        $color = Color::find($this->color_id);
        $color->delete();
    }

    public function removeSize() {
        $size = Size::find($this->size_id);
        $size->delete();
    }

    public function render()
    {
        return view('livewire.admin.variant-products.admin-variant-index', [
            'colors' => Color::get(),
            'sizes' => Size::get(),
            'styles' => Style::get()
        ])->extends("layouts.admin");
    }
}
