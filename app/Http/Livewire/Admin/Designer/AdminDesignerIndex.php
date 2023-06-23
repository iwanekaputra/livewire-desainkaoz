<?php

namespace App\Http\Livewire\Admin\Designer;

use App\Models\UploadProductDesign;
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
        $product = UploadProductDesign::find($this->product_design_id);
        $product->update([
            'is_approved' => 1
        ]);
    }

    public function render()
    {
        return view('livewire.admin.designer.admin-designer-index', [

            'uploadProductDesigns' => UploadProductDesign::where('is_approved', 0)->get(),
        ])->extends("layouts.admin");
    }
}
