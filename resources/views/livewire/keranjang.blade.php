<div class="container">
  
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a style="text-decoration: none" class="text-dark" href="{{ route('home') }}">Home</a></li>

          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </nav>

      <div class="jumbotron bg-putih shadow-sm">
        <div class="container mt-jumbotron">
            @if (session()->has('message'))
              <div class="alert alert-success mb-3">
                  {{ session('message') }}
              </div>
            @endif
            <table class="table">
                <thead class="">
                  <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="">                  
                    @forelse ($pesanan_details as $ps)
                        <tr class="mt-3">
                            <td>
                                <img style="border-radius: 5px;" src="{{ asset('storage/' . $ps->product->gambar) }}" class="img-fluit text-center" width="150px" alt="...">
                            </td>
                            <td>{{ $ps->product->nama }}</td>
                            <td>{{ $ps->jumlah_pesanan }}</td>
                            <td>Rp. {{ number_format($ps->product->harga) }}</td>
                            <td>    
                              <i wire:click="destroy({{ $ps->id }})" class="fas fa-trash text-danger w-i-h"></i>
                            </td>
                        </tr>
                    @empty
                            <td colspan="5" class="text-center mt-5">Tidak ada barang dalam keranjang, ayo belanja sekarang! </td>
                    @endforelse
                </table>

                @if (!empty($pesanan))
                <div class="container">
                    <div class="d-flex justify-content-end">              
                      Total Harga <strong> : Rp. {{ number_format($pesanan->total_harga) }}</strong>         
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                      @if ($this->pesanan->status == 1)
                      <a href="{{ route('checkout') }}" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Lihat Status</a>       
                      @elseif($this->pesanan->status == 0)
                      <a href="{{ route('checkout') }}" class="btn btn-success"><i class="fas fa-arrow-right"></i> checkout</a>       
                      @endif
                    </div>        
                </div>
                @endif
                          
        </div>
      </div>
      
      {{-- Tampilan Product --}}
      <section class="product">
        <h5 class="mt-3"><strong>Lihat juga</strong></h5>
        <div class="row mt-3">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card shadow-sm mb-3">
                        @if ($product->gambar) 
                        <img src="{{ asset('storage/' . $product->gambar) }}" class="card-img-top" alt="...">   
                        @else
                        <img src="{{ asset('storage/product/dafault.jpg') }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5><strong>{{ $product->nama }}</strong></h5>
                            <h5>Rp. {{ number_format($product->harga, 0, ",", ".") }},-</h5>
                        </div>
                        <div class="row">
                          <div class="col-md-4 text-center ">
                              
                                  @if ($product->is_ready == 1)
                                  <span class="badge badge-success d-inline ml-3">Ready Stock</span>
                                  @endif
                                  @if ($product->is_ready == 2)
                                  <span class="badge badge-danger d-inline ml-3">Stok Habis</span>
                                  @endif
                                  <p class="ml-3">
                                      @if ($product->terjual != null)
                                       {{ $product->terjual }}
                                      @else       
                                      0
                                      @endif
                                      terjual 
                                  </p>
                              
                          </div>
                          <div class="col-md-8">
                              <div class="d-flex justify-content-center ml-1">
                                  <a href="/" class="btn btn-outline-secondary text-dark mb-3 mr-1"><i class="fas fa-shopping-cart"></i></a>
                                  <a href="{{ route('products.detail', $product->id) }}" class="btn btn-outline-success mb-3">Lihat..</a>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            @endforeach
        </div> 
    </section>
    {{-- Tampilan Product --}}

    <div class="d-flex justify-content-center mt-3">
        <a href="{{ route('products') }}" class="btn btn-outline-success w-50">Lihat semua produk</a>
    </div>

  </div>

