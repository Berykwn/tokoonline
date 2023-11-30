@extends('layouts.admin')
   
@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Detail Product</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
 
                    @if ($product->gambar) 
                    <img style="border-radius: 5px;" src="{{ asset('storage/' . $product->gambar) }}" class="d-block mb-1 w-100 shadow-sm" alt="...">
                    @else
                    <img style="border-radius: 5px;" src="{{ asset('storage/product/dafault.jpg') }}" class="d-block mb-1 w-100 shadow-sm" alt="...">
                    @endif

                    
                </div>
                <div class="col-md-6">
                    <h5>Nama : <strong class="text-dark">{{ $product->nama }}</strong></h5>
                    @foreach ($brand as $item)
                    <h5>Brand : <img src="{{ url('assets/brand') }}/{{ $item->gambar }}" class="img-thumbnail border border-light" alt="" width="70px;"></h5>
                    @endforeach 
                    <h5>Ketersedian : 
                        @if ($product->is_ready == 1)
                        <strong class="text-dark">Ready stok</strong> 
                        @else
                        <strong class="text-danger">Tidak tersedia</strong> 
                        @endif
                    </h5>
                    <h5>Garansi : <strong class="text-dark">{{ $product->jenis }}</strong></h5>
                    <h5>Berat : <strong class="text-dark">{{ $product->berat }} Kg</strong> </h5>

                    <a href="/dashboard/product/{{ $product->id }}/edit" class="btn btn-success">Edit</a>
                    <form action="/dashboard/product/{{ $product->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?')">Hapus</button>
                      </form>
                </div>
            </div>
            <h3 class="mt-3"><strong class="text-dark">Deskripsi</strong></h3>
            <article class="my-3 fs-5">
                {!! $product->deskripsi !!}
            </article>
            
            
        </div>
      </div>
</div>


@endsection