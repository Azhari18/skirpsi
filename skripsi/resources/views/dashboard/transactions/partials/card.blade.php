<div class="col">
    <div class="card"
        onclick="checkId({{ $good['id'] }}, '{{ $good['name'] }}', {{ $good['price'] }}, '{{ asset('storage/' . $good->image) }}')">
        @if ($good->image)
            <div style="max-height: 150px; overflow:hidden">
                <img src="{{ asset('storage/' . $good->image) }}" alt="..."
                    draggable="false" class="card-img-top">
            </div>

        @else
            <div style="max-height: 150px; overflow:hidden">
                <img src='img/default.png' draggable="false" class="card-img-top"
                    alt="...">
            </div>
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $good['name'] }}</h5>
            <p class="card-text fw-bold">{{ $good['price'] }}</p>
        </div>
    </div>
</div>