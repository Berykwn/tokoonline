<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $product = Product::latest()->paginate(4);
        return view('admin.product.index',[
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.product.tambahproduct', [
            'brand' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'brand_id' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|file|max:8000'
        ]);

        if($request->file('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->store('product');
        }

        $validateData['is_ready'] = 1;
        Product::create($validateData);
        return redirect('/dashboard/product')->with('success', 'Berhasil menambahkan data Barang');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $brand = Brand::where('id',$product->brand_id)->get();
        return view('admin.product.detailproduct', [
            'product' => $product,
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.editproduct', [
            'product' => $product,
            'brand' => Brand::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'brand_id' => 'required',
            'is_ready' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|file|max:8000'
        ]);
    
        if($request->file('gambar')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['gambar'] = $request->file('gambar')->store('product');
        }
        Product::where('id', $product->id)->update($validateData);

        return redirect('/dashboard/product')->with('success', 'Berhasil mengedit data Barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->gambar){
            Storage::delete($product->gambar);
        }
        Product::destroy($product->id);
        return redirect('/dashboard/product')->with('success', 'Berhasil menghapus produk!');
    }
}
