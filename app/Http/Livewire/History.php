<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use Livewire\Component;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class History extends Component
{
    public $history;
    public $pesanan_details = [];

    public function mount() {
        if(!Auth::user()) {
            return redirect()->route('login');
        }
    }

    public function render() {
        $this->history = DB::table('histories')->latest()->get();
        $this->history = DB::table('histories')->where('user_id', Auth::user()->id)->get();
        return view('livewire.history',
        [
            'title' => 'History',
            'history' => $this->history,
            'pesanan_details' => $this->pesanan_details
        ])->extends('layouts.app')->section('content');;
        }
    }

