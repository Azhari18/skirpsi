@extends('dashboard.transactions.layouts.main')


@section('container')
    <div>
        <div class="row mx-0 py-3 bg-light">

            @if (session()->has('success'))
                {{-- <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('success') }}
                </div> --}}
                <div class="alert alert-success alert-dismissible fade show col-lg-8 text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Start Left Side -->
            <div class="col-sm-8">
                <p class="d-flex justify-content-end align-items-center fw-bold">
                    <small>
                        <span id="day"></span>,
                        <span id="date"></span>
                        <span id="month"></span>
                        <span id="year"></span>
                    </small>
                </p>

                <div class="row justify-content-start mb-3">
                    <!-- Button Home -->
                    <div id="menuBtn">
                        <a href="/dashboard/transactions">
                            <img src="https://img.icons8.com/ios/50/000000/home--v3.png" />
                        </a>
                    </div>
                    <!-- Start Search bar -->
                    <div class="col-md-11 ms-3">
                        <form action="/transaction">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pencarian..." name="search"
                                    value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Search bar -->
                </div>

                <!-- Start Category -->
                <div class="card rounded-3 mb-3">
                    <div class="card-body p-1">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active rounded-pill" id="pills-all-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all"
                                    aria-selected="true">Semua</button>
                            </li>
                            @foreach ($categories as $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill" id="pills-{{ $category->name }}-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-{{ $category->name }}" type="button"
                                        role="tab" aria-controls="pills-{{ $category->name }}"
                                        aria-selected="false">{{ $category->name }}</button>
                                </li>
                            @endforeach
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
                    @if ($goods->count())
                        <!-- Start All Content -->
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            <div class="row row-cols-md-4 g-4">
                                @foreach ($goods as $good)
                                    @include('dashboard.transactions.partials.card')
                                @endforeach
                            </div>
                        </div>
                        <!-- End All Content -->

                        {{-- Start Category Content  --}}
                        @foreach ($categories as $category)
                            <div class="tab-pane fade" id="pills-{{ $category->name }}" role="tabpanel" aria-labelledby="pills-{{ $category->name }}-tab">
                                <div class="row row-cols-1 row-cols-md-4 g-4">
                                    @foreach ($goods as $good)
                                        @if ($good->category->name == $category->name)
                                            @include('dashboard.transactions.partials.card')
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        {{-- End Category Content  --}}                        
                    @else
                        <p class="text-center fs-4">Barang tidak ditemukan</p>
                        <div class="row justify-content-center">
                            <a href="/dashboard/goods/create" class="btn btn-primary btn-lg mb-3 col-lg-4">Tambah Data
                                Barang</a>
                        </div>
                    @endif
                    @include('dashboard.transactions.partials.checkout')

                </div>
                <!-- End Content -->
            </div>
            <!-- End Left Side -->

            <!-- Start Right Side -->
            @include('dashboard.transactions.partials.cart')
            <!-- End Right Side -->
        </div>

        <!-- Modal -->
        @include('dashboard.transactions.partials.calculator')

    </div>
@endsection
