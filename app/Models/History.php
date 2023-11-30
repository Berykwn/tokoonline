<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        'pesanan_id','user_id','nama','total_harga','bank','status_pembayaran','alamat','nohp'
    ];
}
