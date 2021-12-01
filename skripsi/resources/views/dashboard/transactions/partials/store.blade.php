<form method="post" action="/transaction" class="mb-5">
    @csrf
    <input type="number" class="form-control" id="total" name="total" hidden>
    <input type="number" class="form-control" id="customer_paid" name="customer_paid" hidden>
    <input type="number" class="form-control" id="change" name="change" hidden>    
    <input type="text" class="form-control" id="good_quantity" name="good_quantity" hidden>
    <input type="text" class="form-control" id="good_total" name="good_total" hidden>
    <input type="text" class="form-control" id="good_id" name="good_id" hidden>
    {{-- <input type="text" class="form-control" id="good_category_id" name="good_category_id" hidden>     --}}
    <button id="save" type="submit" class="btn btn-primary btn-lg w-50 rounded-pill"  style="margin-left: 375px" disabled="true">SIMPAN</button>
</form>
