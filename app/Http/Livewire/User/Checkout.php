<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Checkout extends Component
{
    public $provinces;
    public $cities;
    public $costs;
    public $provinceId;
    public $cityId;

    public function mount() {
        $response = Http::get('https://api.rajaongkir.com/starter/province', [
            'key' => 'b8f31ec36be6ecde1386c67c11067ee6'
        ]);
        $results = $response->json();
        $this->provinces = $results['rajaongkir']['results'];
    }

    public function updatedProvinceId() {
        $this->getCities();
    }

    public function updatedCityId() {
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
            'destination' => 8,
            'weight' => 260,
            'courier' => 'jne'
        ]);

        $results = $response->json();
        $this->costs = $results['rajaongkir']['results'][0]['costs'];
    }



    public function render()
    {
        return view('livewire.user.checkout')->extends("layouts.app");
    }
}
