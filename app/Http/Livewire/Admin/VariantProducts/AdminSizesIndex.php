<?php

namespace App\Http\Livewire\Admin\VariantProducts;

use App\Models\Size;
use Livewire\Component;

class AdminSizesIndex extends Component
{
    public $color_id;
    public $size_id;
    public $number;

    protected $listeners = [
        'removeSize'
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

    public function alertConfirm($id) {
        $this->size_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!',
            'action' => 'removeSize'
        ]);
    }

    public function removeSize() {
        $size = Size::find($this->size_id);
        $size->delete();
    }

    public function render()
    {
        return view('livewire.admin.variant-products.admin-sizes-index', [
            'sizes' => Size::get(),
        ])->extends("layouts.admin");
    }
}
