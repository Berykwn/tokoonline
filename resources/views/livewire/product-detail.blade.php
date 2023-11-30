
    

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a style="text-decoration: none" class="text-dark" href="{{ route('home') }}">Home</a></li>

          <li class="breadcrumb-item" aria-current="page">List Product </li>
          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </nav>

      @if (session()->has('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
      @endif
      {{-- <h2>{{ $title }}</h2> --}}

      <div class="jumbotron bg-putih shadow-sm">
          <div class="container">
              <div class="row mt-jumbotron">
                  {{-- galery product --}}
                  <div class="col-md-4  ">
                      <div class="shadow-sm border brands-hover">
                          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              @if ($product->gambar) 
                            <img style="border-radius: 5px;" src="{{ asset('storage/' . $product->gambar) }}" class="d-block w-100" alt="...">           
                            @else
                            <img style="border-radius: 5px;" src="{{ asset('storage/product/dafault.jpg') }}" class="d-block w-100" alt="..."> 
                            @endif
                            </div>   
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                        </div>
                  </div>
                  {{-- galery product --}}
                  <div class="col-md-8">
                      <form wire:submit.prevent="masukanKeranjang">
                      <h3 class="">{{ $product->nama }}</h3>
                      <hr style="margin-bottom: 3px; margin-top: 0px;">
                              @if ($product->is_ready == 1)
                               <span class="badge badge-success d-inline">Ready stock</span>
                              @else
                               <span class="badge badge-danger d-inline">Stok habis</span>
                              @endif
                              <span class="badge badge-secondary d-inline">{{ $product->jenis }}</span>
                              <p class="d-inline p-1 p-f-detail">Berat: {{ $product->berat }} Kg</p>
                              <p class="d-inline p-1 p-f-detail">Terjual: {{ $product->terjual }} </p>

                              <h3 class="text-secondary mt-2">Rp. {{ number_format($product->harga, 0, ",", ".") }},-</h3>
                              <input id="jumlah_pesanan" type="number"
                                    class="form-control w-75 @error('jumlah_pesanan') is-invalid @enderror"
                                    wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required
                                    autocomplete="name" placeholder="Jumlah pesanan">

                                @error('jumlah_pesanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <button type="submit" class="btn btn-danger mt-3" @if ($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i> Masukan Keranjang</button> 
                            <a href="{{ route('home') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </form>
                        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                          <strong>Hati-hati!</strong> terhadap penipuan mengatas namakan tokokomputer
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                  </div>

                  <h3 class="mt-4">Deskripsi Produk</h3>
                  <article class="my-3 fs-5">
                    {!! ($product->deskripsi) !!}
                </article>
                
              </div>
          </div>
      </div>




</div>

