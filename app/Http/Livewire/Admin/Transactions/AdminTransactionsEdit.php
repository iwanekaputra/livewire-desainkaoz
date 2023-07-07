<?php

namespace App\Http\Livewire\Admin\Transactions;

use App\Models\Transaction;
use Livewire\Component;

class AdminTransactionsEdit extends Component
{

    public $transaction;
    public $status;
    public $totalPrice;
    public $resi;

    public function mount($id) {
        $this->transaction = Transaction::findOrFail($id);
        $this->resi = $this->transaction->resi;
        foreach($this->transaction->transactionDetails as $transactionDetail) {
            $this->totalPrice += $transactionDetail->price;
        }
    }

    public function updateResi() {
        $this->transaction->update([
            'resi' => $this->resi,
            'status' => 'SHIPPING'
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Berhasil update resi',
            'text' => '',
            'timer' => 3000,
        ]);

        return redirect()->route('admin.transactions.edit', $this->transaction->id);
    }

    public function render()
    {
        return view('livewire.admin.transactions.admin-transactions-edit')->extends('layouts.admin');
    }
}
