<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a style="text-decoration: none" class="text-dark" href="{{ route('home') }}">Home</a></li>

                  <li class="breadcrumb-item active" aria-current="page">Semua produk</li>
                </ol>
              </nav>
        </div>
    </div>

        {{-- <h2>{{ $title }}</h2> --}}
 
            <div class="input-group mb-3 w-50 shadow-sm">
                <input wire:model="search" type="text" class="form-control" placeholder="Cari Produk" aria-label="Search Product" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
              </div>

            {{-- Our produk --}}
            <section class="product">
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
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </section>
</div>
