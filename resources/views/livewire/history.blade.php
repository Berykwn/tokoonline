<div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a style="text-decoration: none" class="text-dark" href="{{ route('home') }}">Home</a></li>

          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </nav>
    
      <div class="jumbotron bg-putih shadow-sm">
        <div class="container mt-jumbotron">      
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">No hp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Status pembayaran</th>
                    <th scope="col">Metode pembayaran</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total bayar</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @forelse ($history as $item)
                    <tr>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->nohp }}</td>
                      <td>{{ $item->alamat }}</td>
                        @if ($item->user_id == Auth::user()->id)    
                        @if ($item->status_pembayaran == 'settlement')           
                        <td>Telah Lunas</td>
                        @endif
                        <td>{{ strtoupper($item->bank) }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->updated_at)); }}</td>
                        <td>Rp. {{ number_format($item->total_harga) }}</td>
                        @endif
                        
                        @empty
                        <td colspan="5" class="text-center mt-5">Tidak ada barang dalam keranjang, ayo belanja sekarang! </td> 

                    </tr>
                    @endforelse
                </tbody>
              </table>      
        </div>
    </div>
</div>

