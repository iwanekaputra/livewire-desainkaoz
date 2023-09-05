<?php

namespace App\Http\Livewire\Admin\Designer;

use App\Models\ProductDesign;
use App\Models\ImageDesign;
use App\Models\UploadDesign;
use Livewire\Component;

class AdminDesignerIndex extends Component
{
    public $product_design_id;

    protected $listeners = [
        'update'
    ];

    public function alertConfirm($id)
    {
        $this->product_design_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'Jika setuju, Design ter upload',
                'action' => 'update'
            ]);
    }

    public function update() {
        $product = UploadDesign::find($this->product_design_id);
        $product->update([
            'is_approved' => 1
        ]);
    }

    public function render()
    {
        return view('livewire.admin.designer.admin-designer-index', [
            'productDesigns' => ImageDesign::where('view', 'front')->orderBy('is_approved', 'ASC')->get(),
        ])->extends("layouts.admin");
    }
}