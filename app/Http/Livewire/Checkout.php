<?php

namespace App\Http\Livewire;

use Midtrans\Snap;
use Midtrans\Config;
use Livewire\Request;
use Livewire\Livewire;
use App\Models\History;
use App\Models\Pesanan;
use Livewire\Component;
use Midtrans\Transaction;
use App\Models\PesananDetail;
use Illuminate\Http\Request as HttpRequest;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $total_harga, $nohp, $alamat, $snapToken, $va_number, $gross_amount, $bank, $transaction_status, $deadline, $pesanan, $pesanan_update, $status, $provinsi_id,$kota_id, $jasa, $daftarProvinsi, $daftarKota;
    private $apikey = 'c3393881fb3a1a3bf774ee158d1f0811';
    protected $pesanan_details = [];

    public function mount()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        \Midtrans\Config::$serverKey = 'SB-Mid-server-cDarjsO0-7ktu6bbi5JWn3u2';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // jika sudah memlih pembayaran
        if (isset($_GET['result_data'])) {
            //ambil data pembayaran
            $current_status = json_decode($_GET['result_data'], true);
            $order_id = $current_status['order_id'];
            $this->pesanan = Pesanan::where('id', $order_id)->first();
            $this->pesanan->status = 1;
            $this->pesanan->update();
        } else { //jika tidak tampilkan data pesanan
            $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->first();
        }
        //jika ada data pesanan
        if (!empty($this->pesanan)) {

            if ($this->pesanan->status == 0) {
                $this->total_harga = $this->pesanan->total_harga;
                $this->nohp = Auth::user()->nohp;
                $this->alamat = Auth::user()->alamat;
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $this->pesanan->id,
                        'gross_amount' => $this->total_harga,
                    ),
                    'customer_details' => array(
                        'first_name' => 'Sdr. ',
                        'last_name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                        'phone' => $this->nohp,
                    ),
                );
                $this->snapToken = \Midtrans\Snap::getSnapToken($params);
                
            } else if ($this->pesanan->status == 1) {
                $status = \Midtrans\Transaction::status($this->pesanan->id);
                $status = json_decode(json_encode($status), true);
                //menampilkan status pembayaran
                $this->va_number = $status['va_numbers'][0]['va_number'];
                $this->gross_amount = $status['gross_amount'];
                $this->bank = $status['va_numbers'][0]['bank'];
                $this->transaction_status = $status['transaction_status'];
                $transaction_time = $status['transaction_time'];
                $this->deadline = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));

                if ($this->transaction_status == 'settlement') {
                    $this->pesanan->status = 2;
                    $this->pesanan->update();
                }             
            } else if ($this->pesanan->status == 2) {
                $status = \Midtrans\Transaction::status($this->pesanan->id);
                $status = json_decode(json_encode($status), true);
                //menampilkan status pembayaran
                $this->va_number = $status['va_numbers'][0]['va_number'];
                $this->gross_amount = $status['gross_amount'];
                $this->bank = $status['va_numbers'][0]['bank'];
                $this->transaction_status = $status['transaction_status'];
                $transaction_time = $status['transaction_time'];
                $this->deadline = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));               
        } else {
            return redirect()->route('home');
        }

        if (isset($_GET['kirim'])) {
            $this->selesai();
        }
    }
    }
    public function selesai()
    {

        History::create([
            'pesanan_id' => $this->pesanan->id,
            'user_id' => Auth::user()->id,
            'nama' => Auth::user()->name,
            'total_harga' => $this->pesanan->total_harga,
            'bank' => $this->bank,
            'status_pembayaran' => $this->transaction_status,
            'alamat' => Auth::user()->alamat,
            'nohp' => Auth::user()->nohp,
        ]);
        $this->pesanan->delete();

        session()->flash('message', 'Berhasil masukan keranjang');
        return redirect()->route('history');
    }

    public function render()
    {

        if (Auth::user()) {
            $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', $this->pesanan->status)->first();
            if ($this->pesanan) {
                $this->pesanan_details = PesananDetail::where('pesanan_id', $this->pesanan->id)->get();
            }
        }
        return view('livewire.checkout', [
            'title' => 'Checkout',
            'pesanan' => $this->pesanan,
            'pesanan_details' => $this->pesanan_details,
        ])->extends('layouts.app')->section('content');
    }
}
