<div class="tab-pane fade" id="pills-checkout" role="tabpanel" aria-labelledby="pills-checkout-tab">
    {{-- <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Customer
            Name</label>
        <div class="col-sm-8">
            <input type="text" class="rounded-pill text-center form-control form-control-lg"
                id="customername" placeholder="Order #001">
        </div>
    </div> --}}

    <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Total Harga Barang</label>
        <div class="col-sm-8">
            <input type="text" class="rounded-pill text-center form-control form-control-lg" id="amountScreen"
                placeholder="amountScreen" disabled>
            <input type="text" id="amount" hidden>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-4 col-form-label col-form-label-lg"></label>
        <div class="col-sm-8">
            <button onclick="exactAmountCalculator()" id="calculatorModal"
                class="btn btn-success btn-lg w-100 rounded-pill" data-bs-toggle="modal"
                data-bs-target="#amountcalculator">Masukkan Uang Pembayaran </button>
        </div>
    </div>
    <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Jumlah Uang Pembayaran</label>
        <div class="col-sm-8">
            <input type="text" class="rounded-pill text-center form-control form-control-lg"
                id="customeramountpaid" placeholder="uang pembayaran" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Kembalian</label>
        <div class="col-sm-8">
            <input type="text"
                class="rounded-pill text-center form-control form-control-lg fw-bold"
                id="customeramountchange" placeholder="kembalian" disabled>
        </div>
    </div>

    @include('dashboard.transactions.partials.store')
</div>