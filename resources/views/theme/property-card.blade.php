<a href="{{ route('frontend.property.show', $property) }}">
    <div class="card property-item hover text-dark" style="background-color: #fbf7fb;">
        <img src="{{ $property->image != null ? asset('storage/' . $property->image) : asset('assets/img/real-estate.jpg') }}"
            alt="{{ $property->title }}" class="image img-fluid" style="width:100%; height:200px">
        <div class="pi-badge text-capitalize {{ $property->for == 'sale' ? 'new' : 'offer' }}">
            {{ $property->for }}</div>
        <div class="px-3 py-2">
            <div class="font-weight-bold d-flex">
                @if ($property->for=='rent')
                <span class="font-small">
                    @if ($property->overall_rating !=null)
                    <span class="badge-warning badge text-white">{{$property->overall_rating}} <i
                            class="fa fa-star"></i></span>
                    @else
                    {{-- <span class="fa fa-star-o text-success"></span> --}}
                    @endif
                </span>
                @endif
                <span
                    class="ml-auto text-danger ">{{ 'NRs.'. $property->price . ($property->for == 'rent' ? "/$property->price_per" : '/-') }}</span>

            </div>
            <div class="text-capitalize font-weight-bold text-muted">
                {{ $property->title }}
            </div>
            <div class=" fa fa-map-marker">
                {{ $property->city->name . ', ' . $property->address_line }}</div>

        </div>
    </div>
</a>