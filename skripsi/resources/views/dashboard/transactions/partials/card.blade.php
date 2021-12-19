<div class="col">
    <div class="card"
        onclick="checkId({{ $good['id'] }}, '{{ $good['name'] }}', {{ $good['price'] }}, '{{ asset('storage/' . $good->image) }}')">
        @if ($good->image)
            <div style="max-height: 150px; overflow:hidden">
                <img src="{{ asset('storage/' . $good->image) }}" alt="..." draggable="false" class="card-img-top">
            </div>

        @else
            <div style="max-height: 150px; overflow:hidden">
                <img src='default.png' draggable="false" class="card-img-top" alt="...">
            </div>
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $good['name'] }}</h5>
            <p class="card-text fw-bold">Rp
                @php
                    $price = number_format($good['price'],0,",",".") ;
                    echo $price
                @endphp
            </p>
        </div>
    </div>
</div>
