<div class="card property-item hover text-dark rounded-0" style="background-color: #fbf7fb;">
    <div class="p-img-wrapper">
        <a href="{{ route('frontend.property.show', $property) }}">
            <img src="{{ $property->image != null ? asset('storage/' . $property->image) : asset('assets/img/real-estate.jpg') }}"
                alt="{{ $property->title }}" class="image img-fluid" style="width:100%; height:200px">
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
<div class="px-2 py-2"\>
    <div class="font-weight-bold">
        <span
            class="ml-auto text-danger">{{ 'NRs.'. $property->price . ($property->for == 'rent' ? "/$property->price_per" : '/-') }}</span>
    </div>
    <div class="text-capitalize">
        {{ $property->title }}
    </div>
    <div class=" fa fa-map-marker">
        {{ $property->city->name . ', ' . $property->address_line }}</div>
</div>
</div>