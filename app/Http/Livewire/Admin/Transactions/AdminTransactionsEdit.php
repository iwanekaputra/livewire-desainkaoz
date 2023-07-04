<?php

namespace App\Http\Livewire\Admin\Transactions;

use App\Models\Transaction;
use Livewire\Component;

class AdminTransactionsEdit extends Component
{

    public $transaction;
    public $status;
    public $totalPrice;

    public function mount($id) {
        $this->transaction = Transaction::findOrFail($id);

        foreach($this->transaction->transactionDetails as $transactionDetail) {
            $this->totalPrice += $transactionDetail->price;
        }
    }

    public function render()
    {
        return view('livewire.admin.transactions.admin-transactions-edit')->extends('layouts.admin');
    }
}
