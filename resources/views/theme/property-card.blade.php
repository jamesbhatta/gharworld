<style>
    .img-property-result {
        width: 100%;
        height: 200px;
    }

    .property-result-text {
        font-size: 16px;
    }

    .str {
        max-width: 230px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    @media only screen and (max-width: 600px) {
        .img-property-result {
            width: 100%;
            height: 100px;
        }

        .property-result-text {
            font-size: 12px;
        }
        .str {
        max-width: 165px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    }
</style>
<div class="card property-item hover text-dark rounded-0 property-result-text" style="background-color: #fbf7fb;">
    <div class="p-img-wrapper">
        <a href="{{ route('frontend.property.show', $property) }}">
            <img src="{{ $property->image != null ? asset('storage/' . $property->image) : asset('assets/img/real-estate.jpg') }}"
                alt="{{ $property->title }}" class="img-property-result">
        </a>
        {{-- <div class="pi-badge text-capitalize {{ $property->for == 'sale' ? 'new' : 'offer' }}">{{ $property->for }}
    </div> --}}
    <div class="wishlist">
        <livewire:wishlist-button :property="$property" />
    </div>
    <div class="rating">
        @if ($property->for=='rent')
        @if ($property->overall_rating !=null)
        <span class="bg-success p-2 text-white">{{$property->overall_rating}} <i class="fa fa-star-o"></i></span>
        @endif
        @endif
    </div>
</div>
<div class="px-2 py-2" \>
    <div class="font-weight-bold">
        <span
            class="ml-auto text-danger">{{ 'NRs.'. $property->price . ($property->for == 'rent' ? "/$property->price_per" : '/-') }}</span>
    </div>
    <div class="text-capitalize str">
        {{ $property->title }}
    </div>
    <div class=" fa fa-map-marker str">
        {{-- {{substr($property->city->name . ', ' . $property->address_line, 0, 20). "..."}} --}}
        {{-- {{ $first10words = implode(' ', array_slice(str_word_count($property->city->name . ', ' . $property->address_line,1), 0, 3))  }}
        --}}
        {{$property->city->name . ', ' . $property->address_line}}
    </div>
</div>
</div>