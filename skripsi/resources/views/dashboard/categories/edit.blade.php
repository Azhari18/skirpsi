@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Kategori</h1>
    </div>
    <div class="col-lg-8 mb-3">
        <form method="post" action="/dashboard/categories/{{ $category->id }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Id Kategori</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id"
                    value="{{ old('id', $category->id) }}" disabled>
                @error('id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus
                    value="{{ old('name', $category->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>                                   
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection
