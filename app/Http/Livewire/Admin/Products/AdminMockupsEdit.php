<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Mockup;




class AdminMockupsEdit extends Component
{
    public $mockup_id;
    public $product;
    public $mockup;
    
    public function mount($id) {
        $mockup = Mockup::find($id);
        $product = Product::find($id);
        if($mockup && $product) {
            $this->product_id = $product->id;
            $this->name = $product->name;
            $this->code = $product->code;

            $this->mockup_id = $mockup->id;
            $this->width_canvas = $mockup->width_canvas;
            $this->height_canvas = $mockup->height_canvas;
            $this->top_canvas = $mockup->top_canvas;
            $this->left_canvas = $mockup->left_canvas;
        }

        $this->product = $product;
        $this->mockup = $mockup;

    }
    public function update() {
        $mockup = Mockup::find($this->mockup_id);

        if($mockup) {
            $mockup->update([
                'width_canvas' => $this->width_canvas,
                'height_canvas' => $this->height_canvas,
                'top_canvas' => $this->top_canvas,
                'left_canvas' => $this->left_canvas,
            ]);

            return redirect()->route('admin.mockups.edit', $mockup->id);
        }
    }
    public function render()
    {
        return view('livewire.admin.products.admin-mockups-edit',[
            'mockups' => Mockup::get(),

        ])->extends("layouts.admin");
    }
}
