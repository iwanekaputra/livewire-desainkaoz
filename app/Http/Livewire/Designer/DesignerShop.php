<?php

namespace App\Http\Livewire\Designer;

use App\Models\UploadProductDesign;
use Livewire\Component;

class DesignerShop extends Component
{
    public function render()
    {
        return view('livewire.designer.designer-shop', [
            'uploadProductDesigns' => UploadProductDesign::where("user_id", 2)->paginate(25)
        ])->extends('layouts.app');
    }
}
