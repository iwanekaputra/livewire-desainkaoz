<?php

namespace App\Http\Livewire\Landingpage;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $listeners = [
        'moveToLogin',
        'moveToDashboard',
        'moveToIndex'
    ];

    public function login () {
        $this->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $user = User::where('email', $this->email)->first();

        if(!$user) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'message' => 'Akun belum terdaftar',
                'text' => 'Mohon untuk daftar terlebih dahulu',
                'timer' => 3000,
                'action' => 'moveToLogin'
            ]);

            return;
        }

        if($user->is_email_verified === 0) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'message' => 'Akun Belum di Verifikasi Email',
                'text' => 'Mohon untuk Verifikasi',
                'timer' => 3000,
                'action' => 'moveToLogin'
            ]);

            return;
        }
        if($user->status === 0 && $user->role_id == "2") {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'message' => 'Akun belum di approve admin',
                'text' => 'Mohon ditunggu',
                'timer' => 10000,
                'action' => 'moveToLogin'
            ]);

            return;
        }

        if(Auth::attempt(['email' => $this->email, 'password'=> $this->password, 'status' => 1, 'is_email_verified' => 1])) {

            if($user->role_id == "1") {
                $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success',
                    'message' => 'Berhasil Masuk',
                    'text' => 'Mohon ditunggu',
                    'timer' => 3000,
                    'action' => 'moveToDashboard'
                ]);
            }

            if($user->role_id == "2" || $user->role_id == "3") {
                $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success',
                    'message' => 'Berhasil Masuk',
                    'text' => 'Mohon ditunggu',
                    'timer' => 3000,
                    'action' => 'moveToIndex'
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'message' => 'Email atau Password salah',
                'text' => '',
                'timer' => 3000,
                'action' => 'moveToLogin'
            ]);

            return;
        }
    }

    public function moveToLogin()
    {
        return redirect()->route('login');
    }

    public function moveToDashboard()
    {
        return redirect()->route('admin.dashboard');
    }

    public function moveToIndex()
    {
        return redirect()->route('index');
    }

    public function render()
    {
        return view('livewire.landingpage.login')->extends('layouts.app');
    }
}
