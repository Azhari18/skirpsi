@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Detail Transaksi</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Id Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detail->good->name }}</td>
                        <td>
                            {{ 'Rp ' . number_format($detail->good->price, 0, ',', '.') }}
                        </td>
                        <td>{{ $detail->quantity }}</td>
                        <td>
                            {{ 'Rp ' . number_format($detail->sub_total, 0, ',', '.') }}
                        </td>
                        <td>{{ $detail->transaction_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
