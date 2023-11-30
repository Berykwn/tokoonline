    <div class="container">

        {{-- form livesearch --}}
        <form action="">
            <div class="input-group mb-3 w-50 shadow-sm">
                <input type="text" class="form-control" placeholder="Cari Produk" aria-label="Search Product" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                </div>
            </div>
        </form>
        {{-- form livesearch --}}

        <div class="row">
            <div class="col-md-8 mt-2">
                {{-- banner atas --}}
                <div id="carouselExampleControls" class="carousel slide banner" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ url('assets/slider/banner2.jpg') }}" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('assets/slider/banner2.jpg') }}" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('assets/slider/banner2.jpg') }}" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                {{-- banner atas --}}
                <h5 class="mt-2"><strong>Terbaru</strong></h5>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="card shadow-sm mb-3">
                                @if ($product->gambar) 
                                <img src="{{ asset('storage/' . $product->gambar) }}" class="card-img-top" alt="...">   
                                @else
                                <img src="{{ asset('storage/product/dafault.jpg') }}" class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5></h5>
                                    <a style="text-decoration: none;" href="{{ route('products.detail', $product->id) }}" class="text-success">Rp.{{ number_format($product->harga, 0, ",", ".") }},-</a>
                                </div>
                                <div class="d-flex justify-content-center">
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                {{-- Pilih Brand --}}
                <section class="brands mt-2">
                    <div class="jumbotron bg-putih shadow-sm border-bottom border-danger">
                        <div class="row">
                            <h5 class="text-center"><strong>Kategori</strong></h5>
                            @foreach ($brands as $brand)
                            <div class="col-md-4">
                                <a href="{{ route('products.brand', $brand->id) }}" style="text-decoration: none">
                                    <div class="brands-hover">
                                        <div class="card-body text-center">
                                        <img style="width: 60px; height:60px;" src="{{ url('assets/brand') }}/{{ $brand->gambar }}" class="text-center" alt="">
                                        <h5 class="text-center text-dark">{{ $brand->nama }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                {{-- Pilih Brand --}}
            </div>
        </div>

        {{-- Tampilan Product --}}
        <section class="product">
            <h5 class="mt-3"><strong>Lainnya</strong></h5>
            <div class="row mt-3">
                @foreach ($productall as $product)
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
                                <div class="col-md-4 text-center">
                                    
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
