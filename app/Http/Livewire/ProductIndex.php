<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search;
    protected $updateQueryString = ['search'];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        if($this->search) {
            $products = Product::where('nama', 'like', '%'.$this->search.'%')->paginate(6);
        }else{
            $products = Product::latest()->paginate(8);
        }
        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'Semua Produk'
        ])->extends('layouts.app')->section('content');

    }
}
