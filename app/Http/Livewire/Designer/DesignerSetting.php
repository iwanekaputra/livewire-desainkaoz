<?php

namespace App\Http\Livewire\Designer;

use App\Models\Bank;
use App\Models\Rekening;
use App\Models\User;
use Livewire\Component;

class DesignerSetting extends Component
{
    public $first_name, $last_name, $address, $no_hp, $email;
    public $name_bank;
    public $no_rekening;
    public $user_id;

    public function mount() {
        $this->user_id = auth()->user()->id;
        $this->first_name = auth()->user()->first_name;
        $this->last_name = auth()->user()->last_name;
        $this->address = auth()->user()->address;
        $this->no_hp = auth()->user()->no_hp;
        $this->email = auth()->user()->email;
    }

    public function storeRekening() {

        if($this->name_bank == "Bank BRI") {
            $image = 'icon-bri.png';
        } elseif($this->name_bank == "Bank BCA") {
            $image = 'icon-bca.png';
        } elseif($this->name_bank == "Bank BNI") {
            $image = 'icon-bni.png';
        } elseif($this->name_bank == "Bank MANDIRI") {
            $image = 'icon-mandiri.png';
        } elseif($this->name_bank == "Bank BSI") {
            $image = 'icon-bsi.png';
        } elseif($this->name_bank == "Bank CIMB Niaga") {
            $image = 'icon-cimb.png';
        } elseif($this->name_bank == "PERMATA BANK") {
            $image = 'icon-permata.png';
        }

        Rekening::create([
            'name_bank' => $this->name_bank,
            'no_rekening' => $this->no_rekening,
            'user_id' => auth()->user()->id,
            'image' => $image
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Berhasil Tambah Rekening',
            'text' => '',
            'timer' => 3000,
            'action' => ''
        ]);

        $this->emit("hideModalStore");
    }

    public function updateProfile() {
        $user = User::find($this->user_id);
        $user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'no_hp' => $this->no_hp,
            'email' => $this->email
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Berhasil Update Profile',
            'text' => '',
            'timer' => 3000,
            'action' => ''
        ]);
    }

    public function render()
    {
        return view('livewire.designer.designer-setting', [
            'banks' => Bank::get(),
            'rekenings' => Rekening::where("user_id", auth()->user()->id)->get()
        ])->extends('layouts.designer');
    }
}
