@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Hutang</h1>
    </div>
   
    <div class="col-lg-8 mb-3">
        <form method="post" action="/dashboard/debts/{{ $debt->id }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="transaction_id" class="form-label">Transaksi id</label>
                <input type="text" class="form-control @error('transaction_id') is-invalid @enderror" id="transaction_id" name="transaction_id" autofocus
                    value="{{ old('transaction_id', $debt->transaction_id) }}">
                @error('transaction_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="customer" class="form-label">Pelanggan</label>
                <select class="form-select" name="customer_id">
                    @foreach ($customers as $customer)
                        @if (old('customer_id', $debt->customer_id) == $customer->id)
                            <option value="{{ $customer->id }}" selected>{{ $customer->name }}</option>
                        @else
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection
