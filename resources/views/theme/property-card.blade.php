 <div class="card property-item hover text-dark" style="background-color: #fbf7fb;">
    <a href="{{ route('frontend.property.show', $property) }}">  
    <img src="{{ $property->image != null ? asset('storage/' . $property->image) : asset('assets/img/real-estate.jpg') }}"
            alt="{{ $property->title }}" class="image img-fluid" style="width:100%; height:200px">
    </a>
        {{-- <div class="pi-badge text-capitalize {{ $property->for == 'sale' ? 'new' : 'offer' }}">
            {{ $property->for }}
        </div> --}}
        <div class="wishlist">
            <livewire:wishlist-button :property="$property" />
        </div>
        <div class="rating">
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
        </div>
        <div class="px-2 py-2" style="font-size: 80%;">
            <div class="font-weight-bold">
                <span class="ml-auto text-danger" >{{ 'NRs.'. $property->price . ($property->for == 'rent' ? "/$property->price_per" : '/-') }}</span>
            </div>
            <div class="text-capitalize">
                {{ $property->title }}
            </div>
            <div class=" fa fa-map-marker">
                {{ $property->city->name . ', ' . $property->address_line }}</div>
        </div>
    </div>
