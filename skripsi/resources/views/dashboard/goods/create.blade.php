@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Barang</h1>
    </div>

    

    <div class="col-lg-8 mb-3">
        <form method="post" action="/dashboard/goods">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Gambar</label>
                <input type="text" class="form-control" id="img" name="img">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e){
            e.preventDefalut();
        })
    </script>

@endsection
