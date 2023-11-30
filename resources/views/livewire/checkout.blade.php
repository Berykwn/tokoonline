    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none" class="text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a style="text-decoration: none" class="text-dark" href="{{ route('keranjang') }}">Keranjang</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>

        @if (session()->has('message'))
        <div class="alert alert-success mb-3">
            {{ session('message') }}
        </div>
        @endif

      <div class="jumbotron bg-putih shadow-sm">
        <div class="container mt-jumbotron">
            
            @if ($this->pesanan->status == 2)
            <div class="alert alert-success" role="alert">
                Berhasil memilih metode pembayaran <strong>Mohon untuk melunasi pembayaran!</strong> 
              </div>
            @endif
            @if ($this->pesanan->status == 3)
            <div class="alert alert-success" role="alert">
                Pembayaran Berhasil, untuk melakukan pesanan Selanjutnya <strong>Klik Button dibawah!</strong> 
              </div>
            @endif

            <div class="row mt-4">
                <div class="col">
                    @if ($pesanan->status == 0)
                        <h4>Informasi Pembelian</h4>
                        <hr>
                        <p>Anda akan membayar sebesar  <strong>Rp. {{ number_format($total_harga) }}</strong> Untuk pesanan dibawah ini: </p>        
                            @foreach ($pesanan_details as $item)
                            <hr>
                            <div class="media mt-3">
                                <img class="mr-3 " style="width: 100px;" src="{{ asset('storage/' . $item->product->gambar) }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ $item->product->nama }}</h5>                 
                                    </div>
                            </div> 
                            @endforeach
                            <hr>                   
                    @endif
                    @if ($pesanan->status == 1)
                        <h4>Informasi Barang</h4>      
                            @foreach ($pesanan_details as $item)
                            <hr>
                            <div class="media mt-3">
                                <img class="mr-3 " style="width: 200px;" src="{{ asset('storage/' . $item->product->gambar) }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0"><strong>{{ $item->product->nama }}</strong></h5>
                                            <div class="d-inline"> 
                                                <p>Harga: <strong>Rp. {{ number_format($item->product->harga) }} </strong> Berat: <strong>{{ $item->product->berat }}</strong></p>
                                            </div>           
                                        </div>
                                    </div>                            
                            @endforeach
                    @endif  
                    @if ($pesanan->status == 2)
                        <h4>Informasi Barang</h4>      
                             @foreach ($pesanan_details as $item)
                            <hr>
                            <div class="media mt-3">
                                <img class="mr-3 " style="width: 200px;" src="{{ asset('storage/' . $item->product->gambar) }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                    <h5 class="mt-0"><strong>{{ $item->product->nama }}</strong></h5>
                                        <div class="d-inline"> 
                                            <p>Harga: <strong>Rp. {{ number_format($item->product->harga) }} </strong> Berat: <strong>{{ $item->product->berat }}</strong></p>
                                        </div>           
                                    </div>
                                </div> 
                            @endforeach
                    @endif 
                </div>

                <div class="col">


                    @if ($pesanan->status == 0)
                    <h4>Pembayaran</h4>
                    <hr>     
                    <form>
                        <div class="form-group">
                            <label for="">No. HP</label>
                            <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp"
                            value="{{ $pesanan->user->nohp }}" autocomplete="name" autofocus>
        
                            @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea wire:model="alamat" class="form-control @error('nama') is-invalid @enderror">{{ $pesanan->user->alamat }}</textarea>
        
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </form> 
                    <button id="pay-button" type="button" class="btn btn-primary btn-block"> Pilih Metode Pembayaran </button>
                    @endif

                    @if ($this->pesanan->status == 1)
                    <h4>Informasi Pembayaran</h4>
                        <hr>                                                
                        <div class="row">
                            <div class="col-md-4">
                                <p>Metode Pembayaran </p>
                                <p>Nomor Virtual Akun</p>
                                <p>Status Pembayaran</p>
                                <p>Tenggat Waktu</p>
                                <p>Total Bayar</p>        
                            </div>
                            <div class="col-md-1">
                                <p><strong> : </strong></p>
                                <p><strong> : </strong></p>
                                <p><strong> : </strong></p>
                                <p><strong> : </strong></p>
                                <p><strong> : </strong></p>
                            </div>                                   
                            <div class="col-md-6">
                                <p><strong>{{ strtoupper($bank) }}</strong></p>
                                <p><strong>{{ $va_number }}</strong></p>
                                <p><strong>{{ $transaction_status }}</strong></p>
                                <p><strong>{{ $deadline }}</strong></p>
                                <p><strong>Rp. {{ number_format($gross_amount) }}</strong></p>
                            </div>                                   
                        </div>                               
                @endif
                @if ($this->pesanan->status == 2)
                    <h4>Informasi Pembayaran</h4>
                    <hr>                                                
                    <div class="row">
                        <div class="col-md-4">
                            <p>Metode Pembayaran </p>
                            <p>Nomor Virtual Akun</p>
                            <p>Status Pembayaran</p>
                            <p>Tenggat Waktu</p>
                            <p>Total Bayar</p>
                        </div>
                        <div class="col-md-1">
                            <p><strong> : </strong></p>
                            <p><strong> : </strong></p>
                            <p><strong> : </strong></p>
                            <p><strong> : </strong></p>
                            <p><strong> : </strong></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>{{ strtoupper($bank) }}</strong></p>
                            <p><strong>{{ $va_number }}</strong></p>
                            <p><strong>{{ $transaction_status }}</strong></p>
                            <p><strong>{{ $deadline }}</strong></p>
                            <p><strong>Rp. {{ number_format($gross_amount) }}</strong></p>
                        </div>
                    </div>                                                             
                @endif
                @if ($this->pesanan->status == 2)   
                <form>
                    <input type="hidden" name="kirim">                                
                    <button type="submit" class="btn btn-success">Transaksi selesai</button>
                </form> 
                @endif        
            </div>
        </div>    
    </div>
</div>
      
</div> {{-- end contianer --}}

    {{-- form get data payment gateway --}}
    <form id="payment-form" method="get" action="checkout">
        <input type="hidden" name="result_data" id="result-data" value="">
        <input type="hidden" name="result_type" id="result-type" value="">
    </form>
    {{-- form get data payment gateway --}}

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-ROYzwHHGFMky3Ovh"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {

            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');
            function changeResult(type,data){
                $("#result-type").val(type);
                $("#result-data").val(JSON.stringify(data));
        }
 
            snap.pay('<?= $snapToken ?>', {
                // Optional
                onSuccess: function(result) {
                    changeResult('success', result);
                    console.log(result.status_message);
                    console.log(result);
                    $("#payment-form").submit();
                },
                // Optional
                onPending: function(result) {
                    changeResult('pending', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                },
                // Optional
                onError: function(result) {
                    changeResult('error', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                }
            });
        };
    </script>



