@extends('layouts.admin')
   
@section('content')

<div class="container">

        <!-- Begin Page Content -->
        <div class="container-fluid">
  
            <!-- DataTales Example -->
            <div class="card shadow-sm mb-3">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Product</h6>
              </div>
    
              <div class="card-body">
                <form method="post" action="/dashboard/product/{{ $product->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                      <label>Nama Product</label>
                      <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Product" value="{{ old('nama', $product->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Harga</label>
                                <input name="harga" type="number" class="form-control  @error('harga') is-invalid @enderror" id="harga" placeholder="Harga" value="{{ old('harga', $product->harga) }}">
                              </div>
                              @error('harga')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kategori</label>
                                <select class="form-control" name="brand_id" id="brand_id">
                                    @foreach ($brand as $item)
                                    @if (old('brand_id', $product->brand_id) == $item->id)                                    
                                    <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                    @endif
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Ketersediaan</label>
                                <select class="form-control" name="is_ready" id="is_ready">
                                    <option value="1">Ready Stok</option>
                                    <option value="2">Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Garansi</label>
                                <input name="jenis" type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Garansi"value="{{ old('jenis', $product->jenis) }}">
                            </div>
                            @error('jenis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Berat</label>
                                <input name="berat" type="text" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="Berat" value="{{ old('berat', $product->berat) }}">
                            </div>
                            @error('berat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $product->gambar }}">
                        @if ($product->gambar)                   
                        <img src="{{ asset('storage/' . $product->gambar) }}" class="img-preview img-fluid mb-3 w-50 d-block">
                        @else                     
                        <img class="img-preview img-fluid mb-3 w-50">
                        @endif
                        <input class="form-control-file @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage()">
                        @error('gambar')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                    </div>
                    
                    <div class="form-group text-dark">
                        <label>Deskripsi</label>
                        @error('deskripsi')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror                       
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $product->deskripsi) }}">
                        <trix-editor input="deskripsi"></trix-editor>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Edit Product</button>
                  </form>
                </div>
              </div>
        
  
          </div>
          <!-- /.container-fluid -->
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result
    } 
}
    
</script>


@endsection