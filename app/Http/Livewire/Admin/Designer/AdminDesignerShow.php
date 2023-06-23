<?php

namespace App\Http\Livewire\Admin\Designer;

use App\Models\UploadProductDesign;
use Livewire\Component;

class AdminDesignerShow extends Component
{
    public $productDesign;

    protected $listeners = [
        'update'
    ];

    public function mount($id) {
        $productDesign = UploadProductDesign::find($id);
        $this->productDesign = $productDesign;
    }

    public function alertConfirm($id){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'Jika setuju, Design ter upload',
            'action' => 'update'
        ]);
    }

    public function update() {
        $this->productDesign->update([
            'is_approved' => 1
        ]);

        redirect()->route('admin.designer.index');
    }

    public function render()
    {
        return view('livewire.admin.designer.admin-designer-show')->extends('layouts.admin');
    }
}
