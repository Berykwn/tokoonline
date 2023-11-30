<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Pesanan;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\PesananDetail;

class Navbar extends Component
{
    public $jumlah = 0;
    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang'
    ];

    public function updateKeranjang()
    {
        if(Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            if($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }else{
                $this->jumlah = 0;
            }
        }
    }
    public function mount() {

        if(Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
            if($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }else{
                $this->jumlah = 0;
            }
        }

    }

    public function render()
    {
        return view('livewire.navbar', [
            'brands' => Brand::all(),
            'jumlah_pesanan' => $this->jumlah
        ])->extends('layouts.app')->section('content');
    }
}
