<?php

namespace App\Http\Livewire\User;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransanctionDetail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Http;



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
    public $province;
    public $city;

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

        $results = $response['rajaongkir']['results']['province'];
        $this->province = $results;

        $this->getCities();
    }

    public function updatedCityId() {
        $response = Http::get('https://api.rajaongkir.com/starter/city', [
            'id' => $this->cityId,
            'province' => $this->provinceId,
            'key' => 'b8f31ec36be6ecde1386c67c11067ee6'
        ]);

        $results = $response->json();

        $this->city = $results['rajaongkir']['results']['city_name'];
    }

    public function updatedCourier() {
        $this->getCost();
    }

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
        $user->update([
            'address' => $this->address,
            'province' => $this->province,
            'city' => $this->city
        ]);

        $code = 'STORE-' . mt_rand(000000, 999999);

        $transaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'shipping_price' => $this->ongkir,
            'total_price' => $this->price + $this->ongkir,
            'status' => 'PENDING',
            'courier' => $this->courier,
            'code' => $code
        ]);


        foreach($this->carts as $cart) {
            $trx = 'TRX-'. mt_rand(000000, 999999);
            TransanctionDetail::create([
                'transaction_id' => $transaction->id,
                'upload_product_design_id' => $cart->uploadProductDesign->id,
                'price' => $cart->uploadProductDesign->total_price,
                'status' => 'PENDING',
                'quantity' => $cart->quantity,
                'size' => $cart->size,
                'color' => $cart->color,
                'code' => $trx
            ]);
        }

        return redirect()->route("pay", $transaction->id);

    }



    public function render()
    {
        return view('livewire.user.checkout')->extends("layouts.app");
    }
}
