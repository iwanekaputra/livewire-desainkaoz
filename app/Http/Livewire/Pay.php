<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;

use Midtrans\Snap;
use Midtrans\Config;

class Pay extends Component
{

    public $pay;
    public $snapToken;

    public $listeners = [
        'result'
    ];

    public function mount($id) {
        $this->pay = Transaction::find($id);

        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config("services.midtrans.isProduction");
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');


        $params = [
            'transaction_details' => [
                'order_id' => $this->pay->code,
                'gross_amount' => $this->pay->total_price,
            ],
            'customer_details' => [
                'first_name' => $this->pay->user->first_name,
                'email' => $this->pay->user->email
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bank_transfer'
            ],
            'vtweb' => []
        ];

        $this->snapToken = \Midtrans\Snap::getSnapToken($params);

    }

    public function result($data){
        if($data['result']['status_code'] == '200') {
            $this->pay->update([
                'status' => 'PAID'
            ]);
        }

        return redirect()->route('index');

    }

    public function render()
    {
        return view('livewire.pay')->extends('layouts.app');
    }
}
