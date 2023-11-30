@extends('layouts.admin')
   
@section('content')

<div class="container">

        <!-- Begin Page Content -->
        <div class="container-fluid">
  
            <!-- DataTales Example -->
            <div class="card shadow-sm">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
              </div>
              <div class="card-body">
              @if (session()->has('success'))
                <div class="alert alert-success">
                  {{ session("success") }}
                </div>           
              @endif     
               <div class="table-responsive">
                  <a href="/dashboard/product/create" class="btn btn-primary mb-3">Tambah Product</a>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Berat</th>
                            <th scope="col">Harga</th>
                            <th scope="col" class="text-center">Aksi</th>
                          </tr>
                    </thead>
                    <tbody>
                      @foreach ($product as $item)    
                      <tr>
                          <td>{{ $item->nama }}</td>
                          <td>{{ $item->harga }}</td>
                          <td>{{ $item->berat }} Kg</td>
                          <td>Rp. {{ number_format($item->harga) }}</td>
                          <td class="w-25 text-center ">                     
                              <a href="/dashboard/product/{{ $item->id }}" class="btn btn-info mt-2"><i class="fa fa-eye"></i></a>
                              <a href="/dashboard/product/{{ $item->id }}/edit" class="btn btn-success mt-2"><i class="fa fa-pen"></i></a>
                              <form action="/dashboard/product/{{ $item->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger mt-2" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i class="fa fa-trash"></i></button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-end">
                    {{ $product->links() }}
                </div>
                </div>
              </div>
            </div>
  
          </div>
          <!-- /.container-fluid -->
</div>


@endsection