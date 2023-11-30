@extends('layouts.admin')
   
@section('content')

<div class="container">

    <div class="row">
        <div class="col-sm-4">
          <div class="card shadow-sm border-bottom-success">
            <div class="card-body">
              <h5 class="card-title">Data Transaksi</h5>
              <p class="card-text">Total Transaksi Berhasil : <strong>{{ $history }}.</strong></p>
              
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card shadow-sm border-bottom-primary">
            <div class="card-body">
              <h5 class="card-title">Data Barang</h5>
              <p class="card-text">Total Data Barang : <strong>{{ $product }}</strong>.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="jumbotron bg-light">
      </div>
      <div class="jumbotron bg-light">
      </div>

</div>


@endsection