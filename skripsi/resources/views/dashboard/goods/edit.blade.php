@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Barang</h1>
    </div>

    <div class="col-lg-8 mb-3">
        <form method="post" action="/dashboard/goods/{{ $good->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Barang</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus
                    value="{{ old('name', $good->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga Barang</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    value="{{ old('price', $good->price) }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Barang</label>
                <input type="hidden" name="oldImage" value="{{ $good->image }}">
                @if ($good->image)
                    <img src="{{ asset('storage/' . $good->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                @endif

                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id', $good->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection
