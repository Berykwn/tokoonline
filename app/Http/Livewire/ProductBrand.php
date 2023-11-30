<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductBrand extends Component
{
    use WithPagination;

    public $search,$brand;
    protected $updateQueryString = ['search'];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function mount($brandId) {
        $brandDetail = Brand::find($brandId);
        if($brandDetail) {
            $this->brand = $brandDetail;
        }
    }

    public function render()
    {
        if($this->search) {
            $products = Product::where('brand_id', $this->brand->id)->where('nama', 'like', '%'.$this->search.'%')->paginate(6);
        }else{
            $products = Product::where('brand_id', $this->brand->id)->paginate(6);
        }
        return view('livewire.product-index', [
            'products' => $products,
            'title' => $this->brand->nama.' Product'
        ])->extends('layouts.app')->section('content');

    }
}
