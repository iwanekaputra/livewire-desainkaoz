<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\imageDesign;
use App\Models\User;

class DashboardController extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-controller', [
            'User' => User::where('role_id', '3')->count(),
            'UserDesigner' => User::where('role_id', '2')->where('status','1')->count(),
            'totaldesign' => imageDesign::where('is_approved','1')->count(),
        ])->extends('layouts.admin');
    }
}
