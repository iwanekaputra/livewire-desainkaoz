<?php

namespace App\Http\Livewire\Landingpage;

use App\Mail\sendMail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class Register extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role_id = 3; // user

    protected $listeners = [
        'moveToIndex'
    ];

    public function register() {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed',
            'role_id' => 'required'
        ]);

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => $this->role_id,
            'status' => 0
        ]);

        $token = Str::random(64);

        VerifyUser::create([
            'user_id' => $user->id,
            'token' => $token
        ]);

        $details = [
            'title' => '',
            'body' => '',
            'token' => $token
        ];

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Silahkan Cek Email Untuk Verifikasi Akun',
            'text' => '',
            'timer' => 3000,
            'action' => 'moveToIndex'
        ]);

        Mail::to($user->email)->send(new sendMail($details));
    }

    public function moveToIndex() {
        redirect()->route('index');
    }

    public function render()
    {
        return view('livewire.landingpage.register')->extends('layouts.app');
    }
}
