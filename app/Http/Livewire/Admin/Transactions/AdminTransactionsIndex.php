<?php

namespace App\Http\Livewire\Admin\Transactions;

use App\Models\Transaction;
use Livewire\Component;

class AdminTransactionsIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.transactions.admin-transactions-index', [
            'transactions' => Transaction::latest()->get(),
        ])->extends('layouts.admin');
    }
}
