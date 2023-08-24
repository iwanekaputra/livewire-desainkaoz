<?php

namespace App\Http\Livewire\Admin\Designer;

use App\Models\ImageDesign;
use App\Models\ProductDesign;
use App\Models\UploadDesign;
use Livewire\Component;

class AdminDesignerShow extends Component
{
    public $productDesign;
    public $imageDesign;

    protected $listeners = [
        'update', 'disapprove'
    ];

    public function mount($id) {
        $productDesign = ProductDesign::find($id);
        $imageDesign = ImageDesign::find($productDesign->image_design_id);
        $this->productDesign = $productDesign;
        $this->imageDesign = $imageDesign;
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

        $this->imageDesign->update([
            'is_approved' => 1
        ]);

        redirect()->route('admin.designer.index');
    }

    public function disapproveConfirm($id){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'Jika setuju, Design Di tolak',
            'action' => 'disapprove'
        ]);
    }
    
    public function disapprove() {
        $this->productDesign->update([
            'is_approved' => 2
        ]);

        $this->imageDesign->update([
            'is_approved' => 1
        ]);

        redirect()->route('admin.designer.index');
    }

    public function render()
    {
        return view('livewire.admin.designer.admin-designer-show')->extends('layouts.admin');
    }
}