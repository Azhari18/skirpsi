<li class="nav-item" role="presentation">
    <button class="nav-link rounded-pill" id="pills-drink-tab" data-bs-toggle="pill" data-bs-target="#pills-drink"
        type="button" role="tab" aria-controls="pills-drink" aria-selected="false">Minuman</button>
</li>

<!-- Start Drink Content -->
<div class="tab-pane fade" id="pills-drink" role="tabpanel" aria-labelledby="pills-drink-tab">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($goods as $good)
            @if ($good->category->name == 'Minuman')
                @include('dashboard.transactions.partials.card')
            @endif
        @endforeach
    </div>
</div>
<!-- End Drink Content -->
