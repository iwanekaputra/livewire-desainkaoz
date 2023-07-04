<?php

namespace App\Http\Livewire\User;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransanctionDetail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

use Midtrans\Snap;
use Midtrans\Config;

class Checkout extends Component
{
    public $provinces;
    public $cities;
    public $costs;
    public $provinceId;
    public $cityId;
    public $carts;
    public $user;
    public $price;
    public $ongkir;
    public $courier;
    public $address;

    public function mount() {
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach($this->carts as $cart) {
            $this->price += $cart->total_price;
        }
        $this->user = auth()->user();
        $response = Http::get('https://api.rajaongkir.com/starter/province', [
            'key' => 'b8f31ec36be6ecde1386c67c11067ee6'
        ]);
        $results = $response->json();
        $this->provinces = $results['rajaongkir']['results'];
    }

    public function updatedProvinceId() {
        $response = Http::get('https://api.rajaongkir.com/starter/province', [
            'id' => $this->provinceId,
            'key' => 'b8f31ec36be6ecde1386c67c11067ee6'
        ]);

        dd($response->json());
        $this->getCities();
    }

    // public function updatedCityId() {
    //     // $this->getCost();
    // }

    public function updatedCourier() {
        $this->getCost();
    }

    // public function updatedOngkir() {
    //     dd($this->ongkir);
    // }

    public function getCities() {
        $response = Http::get('https://api.rajaongkir.com/starter/city', [
            'key' => 'b8f31ec36be6ecde1386c67c11067ee6',
            'province' => $this->provinceId
        ]);

        $results = $response->json();

        $this->cities = $results['rajaongkir']['results'];
    }

    public function getCost() {
        $response = Http::post('https://api.rajaongkir.com/starter/cost', [
            'key' => 'b8f31ec36be6ecde1386c67c11067ee6',
            'origin' => 4,
            'destination' => $this->cityId,
            'weight' => 260,
            'courier' => $this->courier,
        ]);

        $results = $response->json();
        $this->costs = $results['rajaongkir']['results'][0]['costs'];
    }

    public function pay() {

        $user = Auth::user();
        $user->update(['address' => $this->address]);

        $code = 'STORE-' . mt_rand(000000, 999999);

        $transaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'shipping_price' => $this->ongkir,
            'total_price' => $this->price + $this->ongkir,
            'status' => 'PENDING',
            // 'province' =>
            // 'city' =>
            'code' => $code
        ]);


        foreach($this->carts as $cart) {
            $trx = 'TRX-'. mt_rand(000000, 999999);
            TransanctionDetail::create([
                'transaction_id' => $transaction->id,
                'upload_product_design_id' => $cart->uploadProductDesign->id,
                'price' => $cart->uploadProductDesign->total_price,
                'status' => 'PENDING',
                'size' => $cart->size,
                'color' => $cart->color,
                'code' => $trx
            ]);
        }

        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config("services.midtrans.isProduction");
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');


        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $this->price + (int) $this->ongkir,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bank_transfer'
            ],
            'vtweb' => []
        ];

        try {
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }

    }



    public function render()
    {
        return view('livewire.user.checkout')->extends("layouts.app");
    }
}
