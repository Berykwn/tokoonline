{{-- Navbar paling atas --}}
<div class="font-atas" style="background-color: #f9f9f9;">
<ul class="nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link disabled" href="#"><i class="fas fa-envelope"></i> TokoKomputer@gmail.com</a>
    </li>
  </ul>
</div>
{{-- Navbar paling atas --}}


<div class="sticky-top">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="w-font-nav">
                    <strong>Toko</strong><strong class="text-danger">Komputer</strong>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li> --}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">List Product</a>
                        <div class="dropdown-menu">
                            @foreach ($brands as $brand)    
                            <a class="dropdown-item" href="{{ route('products.brand', $brand->id) }}">{{ $brand->nama }}</a>
                            @endforeach
                          <div role="separator" class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('products') }}">Semua Merk</a>
                        </div>
                      </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('keranjang') }}">Keranjang 
                            @if ($jumlah_pesanan == 0)    
                                <i class="fas fa-shopping-bag"></i>
                            @endif
                            @if ($jumlah_pesanan >0)
                            <span class="badge badge-danger">{{ $jumlah_pesanan }}</span>
                            @endif
                        </a>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a href="{{ route('checkout') }}" class="dropdown-item">Pesanan saya</a>
                                <a href="{{ route('history') }}" class="dropdown-item">History</a>
                            </div>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
