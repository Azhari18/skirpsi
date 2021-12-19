@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Barang</h1>
    </div>

    @if (session()->has('success'))
        <div
            class="alert alert-success d-flex align-items-center alert-dismissible fade show col-lg-6 justify-content-center">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert">
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <a href="/dashboard/goods/create" class="btn btn-primary mb-3">Tambahkan data barang</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
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
                        <td>{{ $good->id }}</td>
                        <td>{{ $good->name }}</td>
                        <td>
                            {{ 'Rp ' . number_format($good->price, 0, ',', '.') }}
                        </td>
                        <td>{{ $good->category->name }}</td>
                        <td>
                            <a href="/dashboard/goods/{{ $good->id }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/goods/{{ $good->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
