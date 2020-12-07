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
                        <div class="p-img-wrapper bg-secondary">
                            <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                                <!--Indicators-->
                                <ol class="carousel-indicators">
                                    @for ($i = 0; $i <=$property->images->count(); $i++)
                                        <li data-target="#carousel-example-1z" data-slide-to="{{$i}}" class="active">
                                        </li>
                                        @endfor
                                </ol>
                                <!--/.Indicators-->
                                <!--Slides-->
                                <div class="carousel-inner" role="listbox">
                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="text-center" style="max-height: 500px;">
                                            <img
                                            src="{{ $property->image != null ? asset('storage/' . $property->image) : asset('assets/img/real-estate.jpg') }}"
                                            alt="{{ $property->title }}" style="max-height: 500px; object-fit:cover;">
                                        </div>
                                    </div>
                             
                                    @foreach ($property->images as $image)

                                    <div class="carousel-item">
                                       <div class="text-center" style="max-height: 500px;">
                                           <img src="{{ asset('storage/' . $image->link) }}"
                                           alt="image" style="max-height: 500px; object-fit:cover;">
                                        </div>
                            
                                    </div>
                                    @endforeach
                                </div>
                                <!--/.Slides-->
                                <!--Controls-->
                                <a class="carousel-control-prev" href="#carousel-example-1z" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-1z" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <!--/.Controls-->
                            </div>
                            <div class="wishlist">
                                <livewire:wishlist-button :property="$property" />
                            </div>
                            <div class="rating">
                                @if ($property->for=='rent')
                                @if ($property->overall_rating !=null)
                                <span class="bg-success p-2 text-white">{{$property->overall_rating}} <i
                                        class="fa fa-star-o"></i></span>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
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
                                @if ($property->for == 'sale')
                                <div class="text-secondary">(Negotiable)</div>
                                @endif
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
                        <div class="col-lg-3 col-5 bg-light mx-lg-4 mx-3 mb-3 py-2 px-2">
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

                {{-- @if($property->images->count())
            <h5 class="h5-responsive my-3">Pictures</h5>
            <div id="aniimated-thumbnials">
              
                @foreach ($property->images as $image)
              
                <a href="{{ asset('storage/' . $image->link) }}">
                <img class="py-1 px-1 p-lg-2 col-5 col-lg-3" src="{{ asset('storage/' . $image->link) }}"
                    height="155" />
                </a>

                @endforeach

            </div>
            @endif --}}
            <!-- jQuery -->
            {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js">
            </script>
            <script src="{{ asset('assets/lightgallery/dist/js/lightgallery-all.min.js') }}"></script>
            <script src="{{ asset('assets/lightgallery/lib/jquery.mousewheel.min.js') }}"></script> --}}

            {{-- <script>
                $('#aniimated-thumbnials').lightGallery({
                    thumbnail: true
                });
                
            </script> --}}
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
                        @php
                            $propertyId = $property->id;
                        @endphp
                        @forelse ($properties as $property)
                            @php
                            if ($propertyId == $property->id)
                                continue;
                            @endphp
                     
                        <div class="col-6 col-lg-10 text-color m-0">
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