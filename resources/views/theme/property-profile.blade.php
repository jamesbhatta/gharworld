@extends('theme.client')
@section('main-content')
<div class="my-4"></div>

<!-- Single Property Section end -->
<section class="single-property-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-property">
                    <div class="sp-image mb-0">
                        <img src="{{ $property->image != null ? asset('storage/' . $property->image) : asset('assets/img/real-estate.jpg') }}"
                            alt="{{ $property->title }}" style="width:100%; height:auto">
                        {{-- <div class="sp-badge new text-capitalize">{{ $property->for }}</div> --}}  
                    </div>

                    <div class="d-flex bg-light py-2 px-4 my-2">
                        <div class="py-2">
                            @if ($property->for=='rent')
                            <span>
                                @if ($property->overall_rating !=null)
                                <span class="badge badge-warning text-white p-2">{{$property->overall_rating}} <i
                                        class="fa fa-star"></i></span>
                                @else
                                {{-- <span class="fa fa-star-o text-success"></span> --}}
                                @endif
                            </span>
                            @endif
                        </div>
                        <div class="ml-auto align-self-center">
                            {{-- @auth --}}
                            <livewire:wishlist-button :property="$property" />
                            {{-- @endauth --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            {{-- <h4 class="h4-responsive text-capitalize mb-3"><span
                                    class="badge badge-warning text-white p-2">{{ $property->type}}</span></h4> --}}
                            <h5 class="text-uppercase mb-1 mb-md-0">{{$property->title}}</h5>
                        </div>
                        <div class="col-lg-5 text-left text-lg-right">
                            <div class="property-header">
                                <h5 class="d-inline-block bg-danger text-white p-2">NRs.
                                    {{ number_format($property->price) ."/". ($property->for == 'rent' ? ucfirst($property->price_per) : '-') }}
                                </h5>
                                <div class="text-secondary">(Negotiable)</div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light p-3">
                        <div class="d-flex">
                            <div>
                                <div class="my-2">
                                    <span class="mr-2"><i class="fa fa-map-marker"></i></span>
                                    {{ $property->city->name . ', ' . $property->address_line }}
                                </div>
                                <div class="my-2">
                                    <span class="mr-2"><i class="fa fa-user"></i></span>
                                    {{ $property->for == 'sale' ? "$property->name" : $profile->name }}
                                </div>
                            </div>
                            <div class="ml-auto text-white">
                                @if ($property->for == 'sale')
                                <a class="badge badge-warning px-3" href="tel:{{ $property->contact}}">
                                    <i class=" fa fa-phone p-2"></i>{{ $property->contact}}</a>
                                @else
                                <a class="badge badge-warning px-3" href="tel:{{ $profile->contact}}">
                                    <i class=" fa fa-phone p-2"></i>
                                    {{ $profile->contact}}
                                </a>
                                @endif

                            </div>
                        </div>
                    </div>
                    @isset($property->features)
                    <h5 class="h5-responsive my-3">Features</h5>
                    <div class="bg-light p-3">
                        {!! str_replace(',', '<span class="mx-2">|</span>', $property->features) !!}
                    </div>
                    @endisset
                    @if($property->facilities->count())
                    <h5 class="h5-responsive my-3">Facilities</h5>
                    <div class="row">
                        @foreach ($property->facilities as $facility)
                        <div class="col-md-3 bg-light mx-3 mb-3 py-2 px-3">
                            <span class="text-success mr-2">
                                <i class="{{ $facility->icon ?? 'fa fa-check-circle' }}"></i>
                            </span>
                            {{ $facility->name }}
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>


                @isset($property->description)
                <div class="property-text">
                    <h5 class="h5-responsive my-3">Description</h5>
                    <p>{!! $property->description !!}</p>
                </div>
                @endisset

                @if($property->images->count())
                <h5 class="h5-responsive my-3">Pictures</h5>
                <div id="aniimated-thumbnials">
                    <div class="row">
                        @foreach ($property->images as $image)
                        <div class=" col-lg-4 col-6 p-2">
                            <a href="{{ asset('storage/' . $image->link) }}">
                                <img src="{{ asset('storage/' . $image->link) }}"
                                height="155" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
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
                {{-- @isset($property->location)
                <h5 class="my-3">Map View</h5>
                <div class="map-widget">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522"
                        style="border:0" allowfullscreen></iframe>
                </div>
                @endisset --}}
                @if ($property->for=='rent')
                <div>
                    @if ($property->overall_rating!=null OR Auth::check())
                    <h5 class="h5-responsive mb-2">Rating and Review</h5>
                    @endif
                    @auth
                    <livewire:rating-review :model="$property" />
                    @endauth
                    <livewire:review-list :model="$property" />
                </div>
                @endif
            </div>


            <div class="col-lg-4 col-md-8 sidebar">
                <div class="bg-light">
                    <div class="aw-text">
                        <h5 class="text-center py-3 h5-responsive">Related Property</h5>
                        <div class="row justify-content-center">
                            @forelse ($properties as $property)
                            <div class="col-6 col-lg-10 text-color">
                                @include('theme.property-card')
                            </div>
                            @empty
                            <div class="col-md-12 text-danger text-center justify-content-center">* No data
                                available in
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