@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Hutang</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive">
        <a href="/dashboard/debts/create" class="btn btn-primary mb-3">Tambahkan data hutang</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Customer_id</th>
                    <th scope="col">Transaction_id</th>                    
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($debts as $debt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $debt->customer_id }}</td>
                        <td>{{ $debt->transaction_id }}</td>                        
                        <td>
                            <a href="/dashboard/debts/{{ $debt->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="/dashboard/debts/{{ $debt->id }}" method="post" class="d-inline">
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
