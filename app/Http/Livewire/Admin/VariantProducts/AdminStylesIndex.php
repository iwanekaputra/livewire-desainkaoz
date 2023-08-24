<?php

namespace App\Http\Livewire\Admin\VariantProducts;

use App\Models\Style;
use Livewire\Component;

class AdminStylesIndex extends Component
{
    public $style_id;
    public $name;

    protected $listeners = [
        'remove',
    ];
    public function store() {
        Style::create([
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
        $this->style_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!',
            'action' => 'remove'
        ]);
    }

    public function remove() {
        $style = Style::find($this->style_id);
        $style->delete();
    }

    public function render()
    {
        return view('livewire.admin.variant-products.admin-styles-index', [
            'styles' => Style::get()
        ])->extends("layouts.admin");
    }
}
