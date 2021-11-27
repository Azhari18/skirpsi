@extends('layouts.main')

@section('container')

    <div>
        <div class="row mx-0 py-3 bg-light">

            <!-- Start Left Side -->
            <div class="col-sm-8">
                <p class="d-flex justify-content-between align-items-center fw-bold">Order #001
                    <small class="text-muted">
                        <span id="day"></span>, 
                        <span id="date"></span> 
                        <span id="month"></span>
                        <span id="year"></span>, 
                        <span id="jam"></span></small>
                </p>

                <!-- Start Search bar -->
                <div class="row justify-content-start mb-3">
                    <!-- Start Nav Bar -->
                @include('partials.navbar')
                <!-- End Nav Bar -->
                    <div class="col-md-11 ms-3">
                        <form action="/">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search..." name="search"
                                    value="{{ request('search') }}">
                                <button class="btn btn-danger" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Search bar -->

                <!-- Start Category -->
                <div class="card rounded-3 mb-3">
                    <div class="card-body p-1">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active rounded-pill" id="pills-food-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-food" type="button" role="tab" aria-controls="pills-food"
                                    aria-selected="true">FOOD</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill" id="pills-drink-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-drink" type="button" role="tab" aria-controls="pills-drink"
                                    aria-selected="false">DRINK</button>
                            </li>
                            <li class="nav-item d-none" role="presentation">
                                <button class="nav-link rounded-pill" id="pills-checkout-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-checkout" type="button" role="tab" aria-controls="pills-checkout"
                                    aria-selected="false">CHECK OUT</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Category -->

                <!-- Start Content -->
                <div class="tab-content" id="pills-tabContent">

                    <!-- Start Food Content -->
                    <div class="tab-pane fade show active" id="pills-food" role="tabpanel" aria-labelledby="pills-food-tab">
                        <div class="row row-cols-md-4 g-4">
                            @foreach ($goods as $good)
                                @if ($good->category->name == 'Food')
                                    <div class="col">
                                        <div class="card"
                                            onclick="checkId({{ $good['id'] }}, '{{ $good['name'] }}', {{ $good['price'] }}, 'img/{{ $good['img'] }}');">
                                            <img src='img/{{ $good['img'] }}' draggable="false" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $good['name'] }}</h5>
                                                <p class="card-text fw-bold">{{ $good['price'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- End Food Content -->

                    <!-- Start Drink Content -->
                    <div class="tab-pane fade" id="pills-drink" role="tabpanel" aria-labelledby="pills-drink-tab">
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            @foreach ($goods as $good)
                                @if ($good->category->name == 'Drink')
                                    <div class="col">
                                        <div class="card"
                                            onclick="checkId({{ $good['id'] }}, '{{ $good['name'] }}', {{ $good['price'] }}, 'img/{{ $good['img'] }}');">
                                            <img src='img/{{ $good['img'] }}' draggable="false" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $good['name'] }}</h5>
                                                <p class="card-text fw-bold">{{ $good['price'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- End Drink Content -->

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
                    </div>

                </div>
                <!-- End Content -->
            </div>
            <!-- End Left Side -->

            <!-- Start Right Side -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">

                        <!-- Start Header -->
                        <h5 class="d-flex justify-content-between align-items-center">
                            <span>Order</span>
                            <button onclick="orderbasketClear()" class="btn btn-sm btn-danger rounded-pill">Clear</button>
                            {{-- <span></span> --}}
                        </h5>
                        <hr>
                        <!-- End Header -->

                        <!-- Start List Item -->
                        <ul class="list-unstyled" id="orderlist" style="height: 50vh; overflow-y: auto;">
                        </ul>
                        <hr>
                        <!-- End List Item -->

                        <!-- Start Footer -->
                        <ul class="list-unstyled mb-0">

                            <!-- Start Summary  -->
                            <li class="d-flex justify-content-between align-items-center">
                                <big>Total Items: </big>
                                <big id="totalItems" class=" fw-bold card-text">0</big>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <big>Total: </big>
                                <big class="fw-bold">Rp. <span id="totalCost" class="card-text">0</span></big>
                            </li>
                            <!-- End Summary  -->

                            <!-- Start Check Out Button -->
                            <li>
                                <hr>
                                <button disabled id="checkOutButton" onclick="goToCheckOutTab()"
                                    class="btn btn-primary btn-lg w-100 rounded-pill">CHECK OUT</button>
                            </li>
                            <!-- End Check Out Button -->

                        </ul>
                        <!-- End Footer -->

                    </div>
                </div>
            </div>
            <!-- End Right Side -->
        </div>

        <!-- Modal -->
        @include('partials.calculator')

        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
        </script>

    @endsection
