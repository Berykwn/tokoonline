<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use Livewire\Component;
use Midtrans\Transaction;
use Illuminate\Support\Facades\Auth;

class Status extends Component
{
    public function render()
    {

        $ps = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->first();
        return view('livewire.status', [
            'status' => $ps
        ]      
        )->extends('layouts.app')->section('content');
    }
}
