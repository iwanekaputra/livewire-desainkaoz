<?php

namespace App\Http\Livewire\Designer;

use App\Models\UploadProductDesign;
use Livewire\Component;

class DesignerDesign extends Component
{
    public function render()
    {
        return view('livewire.designer.designer-design', [
            'uploadProductDesigns' => UploadProductDesign::where('user_id', auth()->user()->id)->where('is_approved', 0)->paginate(3),
            'uploadProductDesignApproveds' => UploadProductDesign::where('is_approved', 1)->paginate(15)
        ])->extends('layouts.designer');
    }
}
