@extends('theme.client')
@section('main-content')
    <div class="my-5"></div>
    <div class="container-fluid px-5">
        <!-- Search Result Section end -->
        <section class="search-result-section ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 p-0">
                        <div class="search-results">
                           
                            <div class="row py-5">
                                @forelse ($properties as $property)
                                    <div class="col-md-3">
                                        <div class="property-item">
                                            <div class="pi-image">
                                                <img src="{{ $property->image != null ? asset('storage/' . $property->image) : asset('assets/img/real-estate.jpg') }}"
                                                    alt="{{ $property->title }}" class="image img-fluid img-thumbnail"
                                                    style="height: 180px;">
                                                <div class="pi-badge text-capitalize {{ $property->for == 'sale' ? 'new' : 'offer' }}">
                                                    {{$property->type."-".$property->for }}</div>
                                            </div>
                                            <h3>{{"NRs. ".$property->price . ($property->for == 'rent' ? "/$property->price_per" : '') }}
                                            </h3>
                                            <h5 class="text-capitalize">{{$property->type." | ".$property->title }}</h5>
                                            <div class="pi-metas">
                                                <div class="pi-meta">{{ $property->city->name }}</div>
                                                <div class="pi-meta">{{ $property->address_line }}</div>
                                            </div>
                                            <div class="pi-metas">
                                                <div class="pi-meta">{{ $property->features }}</div>
                                            </div>
                                            <a href="#" class="readmore-btn">Find out more</a>
                                        </div>
                                    </div>
                                @empty

                                @endforelse
                            </div>
                            <button class="site-btn sb-big load-more">load More</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Search Result Section end -->
    </div>

    @include('theme.partials.pagefooter')
@endsection
