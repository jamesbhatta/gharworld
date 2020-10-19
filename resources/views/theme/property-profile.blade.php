@extends('theme.client')
@section('main-content')
<div class="my-4"></div>
<!-- Single Property Section end -->
<section class="single-property-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-property">
                    <div class="sp-image">
                        <img src="{{ $property->image != null ? asset('storage/' . $property->image) : asset('assets/img/real-estate.jpg') }}"
                            alt="{{ $property->title }}" style="width:100%; height:auto">
                        <div class="sp-badge new text-capitalize">{{ $property->for }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="property-header">
                                <h3 class="text-uppercase">{{ $property->type . ' | ' . $property->title }}</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 text-left text-lg-right">
                            <div class="property-header">
                                <h3 class=" text-warning">NRs.
                                    {{ $property->price . ($property->for == 'rent' ? "/$property->price_per" : '/-') }}
                                </h3>
                                <h5>(Negotiable)</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row bg-light p-3">
                        <h5>
                            <div class="py-1"><i class="fa fa-map-marker"></i>
                                {{ $property->city->name . ', ' . $property->address_line }} </div>
                            <div class="py-1">
                                <i class="fa fa-user"></i>
                                {{ $property->for == 'sale' ? "$property->name" : config('app.name') }}
                            </div>
                            <div class="py-1 text-white"><i class=" fa fa-phone p-2 rounded-pill bg-warning"><a
                                        href="tel:{{ $property->for == 'sale' ? "$property->contact" : 'Contact to gharworld ' }}">
                                        {{ $property->for == 'sale' ? "$property->contact" : 'Contact to gharworld ' }}</a></i>
                            </div>
                        </h5>
                    </div>
                    @isset($property->features)
                    <h4>Features</h4>
                    <div class="property-info-bar my-3">

                        <div class="row">
                            <div class="col-lg-7">

                                {!!'<div class="pi-meta">'. str_replace(',',' </div>
                                <div class="pi-meta"> ',$property->features) .'</div>' !!}
                                {{-- <div class="pi-meta">3 Bed </div>
                                        <div class="pi-meta">2 Baths</div>
                                        <div class="pi-meta">1 Garage</div> --}}

                            </div>

                        </div>
                    </div>
                    @endisset
                    @isset($property->facilities)
                    <h4>Facilities</h4>
                    <div class="row py-3">
                        @foreach ($property->facilities as $facility)
                        <div class="col-md-3 bg-light mx-3 my-2 py-2">
                            <span class="text-success mr-1">
                                <i class="{{ $facility->icon ?? 'fa fa-check-circle' }}"></i>
                            </span>
                            {{ $facility->name }}
                        </div>
                        @endforeach
                    </div>
                </div>
                @endisset

                @isset($property->description)
                <div class="property-text">
                    <h4>Description</h4>
                    <p>{!! $property->description !!}</p>
                </div>
                @endisset
                @isset($property->images)


                <h4>Pictures</h4>
                <!-- Place somewhere in the <body> of your page -->
                <div id="aniimated-thumbnials">
                    @foreach ($property->images as $image)
                    <a href="{{ asset('storage/' . $image->link) }}">
                        <img class="row-cols-4 img-responsive p-1" src="{{ asset('storage/' . $image->link) }}"
                            height="155" />
                    </a>
                    @endforeach
                    @endisset
                </div>
                <!-- jQuery -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js">
                </script>
                <script src="{{ asset('assets/lightgallery/dist/js/lightgallery-all.min.js') }}"></script>
                <script src="{{ asset('assets/lightgallery/lib/jquery.mousewheel.min.js') }}"></script>

                <script>
                    $('#aniimated-thumbnials').lightGallery({
                            thumbnail: true
                        });

                </script>
                @isset($property->location)
                <h4 class="my-3">Map View</h4>
                <div class="map-widget">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522"
                        style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            @endisset
            <div class="col-lg-4 col-md-8 sidebar">
                <div class="agent-widget">
                    <div class="aw-text">
                        <h4 class="text-center">Related Property</h4>
                        <div class="row justify-content-center">
                            @forelse ($properties as $property)
                            <div class="col-md-10 text-color">
                                <a href="{{ route('frontend.property.show', $property) }}">
                                    <div class="card property-item hover text-dark">

                                        <img src="{{ $property->image != null ? asset('storage/' . $property->image) : asset('assets/img/real-estate.jpg') }}"
                                            alt="{{ $property->title }}" class="image img-fluid"
                                            style="width:100%; height:200px">
                                        <div
                                            class="pi-badge text-capitalize {{ $property->for == 'sale' ? 'new' : 'offer' }}">
                                            {{ $property->for }}</div>
                                        <div class="px-3 py-2">
                                            <div class="font-weight-bold">
                                                {{ 'NRs. ' . $property->price . ($property->for == 'rent' ? "/$property->price_per" : '/-') }}
                                            </div>
                                            <div class="text-capitalize font-weight-bold text-muted">
                                                <i
                                                    class="{{$property->type == "house" ? 'fa fa-home': ''}}{{$property->type=="land" ? 'fa fa-map': ''}}{{$property->type=="room" ? 'fa fa-object-group': ''}}"></i>
                                                {{ $property->type . ' | ' . $property->title }}
                                            </div>
                                            <div class=" fa fa-map-marker">
                                                {{ $property->city->name . ', ' . $property->address_line }}</div>
                                            <div class=" text-warning">
                                                @for ($i = 0; $i < 5; $i++) <span class="fa fa-star checked"></span>
                                                    @endfor
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @empty
                            <div class="col-md-12 text-danger text-center justify-content-center">* No data available in
                                databale </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('theme.partials.pagefooter')
@endsection