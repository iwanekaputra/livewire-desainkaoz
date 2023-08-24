<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;

class AdminProductsIndex extends Component
{
    public $product_id;
    protected $listeners = [
        'remove' => 'destroy'
    ];


    public function alertConfirm($id)
    {
        $this->product_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'If deleted, you will not be able to recover this imaginary file!',
                'action' => 'remove'
        ]);
    }

    public function destroy()
    {
        $product = Product::find($this->product_id);
        $product->delete();
    }

    public function render()
    {
        return view('livewire.admin.products.admin-products-index', [
            'products' => Product::latest()->get()
        ])->extends("layouts.admin");
    }
}
