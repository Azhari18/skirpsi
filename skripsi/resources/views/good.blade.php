@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center mt-5">Data Barang</h1>
                <form action="/good" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                            id="name" placeholder="Nama" required value="{{ old('name') }}">
                        <label for="name">Nama Barang</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="form-floating">
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                            id="price" placeholder="price" required value="{{ old('price') }}">
                        <label for="price">Harga Barang</label>
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="number" name="category_id" class="form-control @error('category_id') is-invalid @enderror"
                            id="category_id" placeholder="category_id" required value="{{ old('category_id') }}">
                        <label for="category_id">Kategori</label>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="img"
                            class="form-control rounded-bottom @error('img') is-invalid @enderror" id="img"
                            placeholder="img" required>
                        <label for="img">Gambar</label>
                        @error('img')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Simpan</button>
                </form>
                <small class="d-block text-center mt-3">Data barang sudah ada? <a href="/login">Daftar barang</a></small>
            </main>
        </div>
    </div>


@endsection
