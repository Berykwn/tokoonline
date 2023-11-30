<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component
{
    public $product, $jumlah_pesanan;
    public function mount($id) {
        $productDetail = Product::find($id);
        if($productDetail) {
            $this->product = $productDetail;
        }
    }

    public function masukanKeranjang() {
        $this->validate([
            'jumlah_pesanan' => 'required'
        ]);

        //jika user belum login
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        //hitung total harga
        $total_harga = $this->jumlah_pesanan*$this->product->harga;
        //cek apakah user mempunyai data pesanan
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //update data pesanan utama
        if(empty($pesanan)) {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999)
            ]);

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->kode_pemesanan = 'TK-'.$pesanan->id;
            $pesanan->update();

        }else{
            $pesanan->total_harga = $pesanan->total_harga+$total_harga;
            $pesanan->update();
        }

        //menyimpan pesanan detail
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' => $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'total_harga' => $total_harga
        ]);

        
        $this->emit('masukKeranjang');
        session()->flash('message', 'Berhasil masukan keranjang');
        return redirect()->route('keranjang');

    }

    public function render()
    {
        return view('livewire.product-detail', [
            'title' => 'Product Detail'
        ])->extends('layouts.app')->section('content');
    }
}
