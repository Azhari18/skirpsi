<div class="row mb-3">
    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Total Harga Barang</label>
    <div class="col-sm-8">
        <input type="text" class="rounded-pill text-center form-control form-control-lg" id="amount" placeholder="amount"
            disabled>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 col-form-label col-form-label-lg"></label>
    <div class="col-sm-8">
        <button onclick="exactAmountCalculator()" id="calculatorModal" class="btn btn-success btn-lg w-100 rounded-pill"
            data-bs-toggle="modal" data-bs-target="#amountcalculator">Masukkan Jumlah Uang Pembayaran </button>
    </div>
</div>
<div class="row mb-3">
    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Jumlah Uang Pembayaran</label>
    <div class="col-sm-8">
        <input type="text" class="rounded-pill text-center form-control form-control-lg" id="customeramountpaid"
            placeholder="uang pembayaran" disabled>
    </div>
</div>
<div class="row mb-3">
    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Kembalian</label>
    <div class="col-sm-8">
        <input type="text" class="rounded-pill text-center form-control form-control-lg text-danger fw-bold"
            id="customeramountchange" placeholder="kembalian" disabled>
    </div>
</div>
@include('dashboard.transactions.partials.store')
