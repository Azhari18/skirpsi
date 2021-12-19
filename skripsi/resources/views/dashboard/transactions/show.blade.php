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
    @endif

    <div class="table-responsive">        
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Jumlah Uang Pembayaran</th>
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
                        <td>{{ $transaction->total }}</td>
                        <td>{{ $transaction->customer_paid }}</td>
                        <td>{{ $transaction->change }}</td>
                        <td>{{ $transaction->description }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>                            
                            {{-- <a href="/dashboard/transactiondetails/{{ $transaction->id }}" class="badge bg-info"><span data-feather="eye"></span></a>                                                         --}}
                            <a href="/dashboard/transactiondetails?transaction_id={{ $transaction->id }}" class="badge bg-info"><span data-feather="eye"></span></a>                                                        
                            {{-- <a href="/dashboard/transactions/{{ $transaction->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> --}}
                            <form action="/dashboard/transactions/{{ $transaction->id }}" method="post" class="d-inline">
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