<div class="tab-pane fade" id="pills-checkout" role="tabpanel" aria-labelledby="pills-checkout-tab">
    <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Customer
            Name</label>
        <div class="col-sm-8">
            <input type="text" class="rounded-pill text-center form-control form-control-lg"
                id="customername" placeholder="Order #001">
        </div>
    </div>

    <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Amount</label>
        <div class="col-sm-8">
            <input type="text" class="rounded-pill text-center form-control form-control-lg" id="amount"
                placeholder="amount" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-4 col-form-label col-form-label-lg">Customer Paid</label>
        <div class="col-sm-8">
            <button onclick="exactAmountCalculator()" id="calculatorModal"
                class="btn btn-dark btn-lg w-100 rounded-pill" data-bs-toggle="modal"
                data-bs-target="#amountcalculator">Insert Paid Amount</button>
        </div>
    </div>
    <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Amount
            Customer Paid</label>
        <div class="col-sm-8">
            <input type="text" class="rounded-pill text-center form-control form-control-lg"
                id="customeramountpaid" placeholder="amount" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Change</label>
        <div class="col-sm-8">
            <input type="text"
                class="rounded-pill text-center form-control form-control-lg text-danger fw-bold"
                id="customeramountchange" placeholder="change" disabled>
        </div>
    </div>

    @include('dashboard.transactions.partials.store')
</div>