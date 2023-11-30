<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'products' => Product::latest()->take(4)->get(),
            'productall' => Product::take(4)->get(),
            'brands' => Brand::all()
        ])->extends('layouts.app')->section('content');

    }
}
