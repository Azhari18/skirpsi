@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Barang</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive">
        <a href="/dashboard/goods/create" class="btn btn-primary mb-3">Tambahkan data barang</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($goods as $good)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $good->name }}</td>
                        <td>{{ $good->price }}</td>
                        <td>{{ $good->category->name }}</td>
                        <td>
                            <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <a href="" class="badge bg-danger"><span data-feather="x-circle"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
