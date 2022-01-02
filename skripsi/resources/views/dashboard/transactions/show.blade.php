@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Transaksi</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show col-lg-6 justify-content-center">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ session('success') }}    
                <button type="button" class="btn-close" data-bs-dismiss="alert">            
            </div>
        </div>
    @elseif(session()->has('failed'))

        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show col-lg-6 justify-content-center">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                {{ session('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Transaksi</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Uang Pembayaran</th>
                    <th scope="col">Kembalian</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->id }}</td>
                        <td>
                            {{ 'Rp ' . number_format($transaction->total, 0, ',', '.') }}
                        </td>
                        <td>
                            {{ 'Rp ' . number_format($transaction->customer_paid, 0, ',', '.') }}
                        </td>
                        <td class="{{ $transaction->description == 'Lunas' ? 'text-success' : 'text-danger' }} fw-bold">
                            {{ 'Rp ' . number_format($transaction->change, 0, ',', '.') }}
                        </td>
                        <td class="{{ $transaction->description == 'Lunas' ? 'text-success' : 'text-danger' }} fw-bold">
                            {{ $transaction->description }}
                        </td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>
                            <a href="/dashboard/transactiondetails?transaction_id={{ $transaction->id }}"
                                class="badge bg-info"><span data-feather="eye"></span></a>
                            <form action="/dashboard/transactions/{{ $transaction->id }}" method="post"
                                class="d-inline">
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
