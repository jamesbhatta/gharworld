@extends('theme.user-profile')
@section('user-content')
<div class="container">
	<div class="card rounded-0 p-4 z-depth-1">
		@include('partials.alerts')
		<div class="row">
            @forelse ($wishlists as $wishlist)
            <div class="col-md-3 text-color">
                <a href="{{ route('frontend.property.show',$wishlist->property) }}">
                    <div class="card property-item hover text-dark" style="background-color: #fbf7fb;">

                        <img src="{{ $wishlist->property->image != null ? asset('storage/' . $wishlist->property->image) : asset('assets/img/real-estate.jpg') }}"
                            alt="{{ $wishlist->property->title }}" class="image img-fluid" style="width:100%; height:150px">
                        {{-- <div
                            class="pi-badge text-capitalize {{ $wishlist->property->for == 'sale' ? 'new' : 'offer' }}">
                            {{ $wishlist->property->for }}</div> --}}
                        <div class="px-3 py-2">
                            <div class="font-weight-bold d-flex">
                                @if ($wishlist->property->for=='rent')
                                <span class="font-small">
                                    @if ($wishlist->property->overall_rating !=null)
                                    <span class="text-success">{{$wishlist->property->overall_rating}} <i
                                            class="fa fa-star text-success"></i></span>
                                    @else
                                    
                                    <span class="fa fa-star-o text-success"></span>
                                    @endif
                                </span>
                                @endif
                                <span class="ml-auto text-warning ">{{ 'NRs.'. $wishlist->property->price ."/". ($wishlist->property->for == 'rent' ? $wishlist->property->price_per : '-') }}</span>
                
                            </div>
                            <div class="text-capitalize font-weight-bold text-muted">
                                {{ $wishlist->property->title }}
                            </div>
                            <div class=" fa fa-map-marker">
                                {{ $wishlist->property->city->name . ', ' . $wishlist->property->address_line }}</div>
                            
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-md-12 text-danger text-center justify-content-center">* No data available in
                databale </div>
            @endforelse
        </div>
        {{ $wishlists->links() }}
	</div>
</div>
@endsection
