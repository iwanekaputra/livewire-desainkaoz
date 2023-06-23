<?php

namespace App\Http\Livewire\Designer;

use App\Models\UploadProductDesign;
use Livewire\Component;

class DesignerSale extends Component
{
    public $count_product;

    public function mount() {
        $this->count_product = $this->getCountProduct();
    }

    public function getCountProduct() {
        return UploadProductDesign::where('user_id', auth()->user()->id)->count();
    }

    public function render()
    {
        return view('livewire.designer.designer-sale')->extends('layouts.designer');
    }
}
