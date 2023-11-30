@extends('layouts.admin')
   
@section('content')

<div class="container">

        <!-- Begin Page Content -->
        <div class="container-fluid">
  
            <!-- DataTales Example -->
            <div class="card shadow-sm mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Total Pembayaran</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $h)    
                        <tr>
                          <td>{{ $h->nama }}</td>      
                          <td>
                            @if ($h->status_pembayaran == 'settlement')
                                Telah Lunas
                            @endif
                          </td>
                          <td>{{ strtoupper($h->bank) }}</td>
                          <td>{{ $h->alamat }}</td>
                          <td>{{ $h->nohp }}</td>
                          <td>Rp. {{ number_format($h->total_harga) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-end">
                    {{ $history->links() }}
                </div>
                </div>
              </div>
            </div>
  
          </div>
          <!-- /.container-fluid -->

      <div class="jumbotron bg-light">
      </div>
      <div class="jumbotron bg-light">
      </div>

</div>


@endsection