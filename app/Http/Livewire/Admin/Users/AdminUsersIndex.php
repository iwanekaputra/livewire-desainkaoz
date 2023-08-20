<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class AdminUsersIndex extends Component
{
    public $user_id;

    protected $listeners = [
        'update'
    ];

    public function alertConfirm($id)
    {
        $this->user_id = $id;
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'message' => 'Are you sure?',
                'text' => 'Jika setuju, designer bisa login',
                'action' => 'update'
            ]);
    }

    public function update() {
        $user = User::find($this->user_id);
        $user->update([
            'status' => 1
        ]);
    }

    public function render()
    {
        return view('livewire.admin.users.admin-users-index', [
            'users' => User::where('role_id', 2)->orderBy('status', 'ASC')->get()
        ])->extends('layouts.admin');
    }
}
