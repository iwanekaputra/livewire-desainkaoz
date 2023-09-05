<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class DesignController extends Controller
{

    public function addCart(Request $request) {

        $cart = Cart::create([
            'product_design_id' => $request->product_design_id,
            'user_id' => $request->user_id,
            'size' => $request->size,
            'style' => $request->style,
            'color' => $request->color,
            'total_price' => $request->price,
            'quantity' => $request->quantity
        ]);

        if($cart) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil tambah ke keranjang'
            ], 200);
        } else {
            return response()->json([
                'status' => 422,
                'message' => 'Berhasil tambah ke keranjang'
            ], 422);
        }


    }

}
