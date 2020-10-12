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
                                alt="{{ $property->title }}">
                            <div class="sp-badge new text-capitalize">{{ $property->for }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="property-header">
                                    <h3 class="text-uppercase">{{ $property->type . ' | ' . $property->title }}</h3>
                                    <h5 class="py-1"><i class="fa fa-map-marker"></i>
                                        {{ $property->city->name . ', ' . $property->address_line }} </h5>
                                    <h5 class="py-1">
                                        <i class="fa fa-user"></i>
                                        {{ $property->for == 'sale' ? "$property->name" : config('app.name') }}
                                    </h5>
                                    <h5 class="py-1"><i class=" fa fa-phone"></i><a
                                            href="tel:{{ $property->for == 'sale' ? "$property->contact" : 'Contact to gharworld ' }}"
                                            class="text-secondary">
                                            {{ $property->for == 'sale' ? "$property->contact" : 'Contact to gharworld ' }}</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-lg-4 text-left text-lg-right">
                                <div class="property-header">
                                    <h3>NRs.
                                        {{ $property->price . ($property->for == 'rent' ? "/$property->price_per" : '/-') }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="property-info-bar">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="pi-metas">
                                        <div class="pi-meta">3 Bed </div>
                                        <div class="pi-meta">2 Baths</div>
                                        <div class="pi-meta">1 Garage</div>
                                    </div>
                                </div>
                                <div class="col-lg-5 text-left text-lg-right d-none">
                                    <a href="#" class="offer-btn">Make an Offer</a>
                                </div>
                            </div>
                        </div>
                        <div class="property-feature">

                        </div>

                        <div class="row">
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>House Type</h6>
                                    <p>Family</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>Stories</h6>
                                    <p>3</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>Year Built</h6>
                                    <p>2008</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>A/C</h6>
                                    <p>Central</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>Heating</h6>
                                    <p>Forced Air</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>Bathrooms</h6>
                                    <p>2</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>Pool</h6>
                                    <p>Yes</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>Fireplace</h6>
                                    <p>No</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>Parking Spaces</h6>
                                    <p> 2 spaces</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>Parking Type</h6>
                                    <p>Garage</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>Patio</h6>
                                    <p>128 SQ</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="pf-box">
                                    <h6>Playgroung</h6>
                                    <p>No</p>
                                </div>
                            </div>
                        </div>
                        <h4>Facilities</h4>
                        <div class="row py-3">
                            @foreach ($facilities as $facility)
                                @foreach ($facility_properties as $facility_property)
                                    @if ($facility->id == $facility_property->facility_id)
                                        <div class="col-md-3 bg-light mx-3 my-2 py-2">
                                            <i class="fa fa-check-circle text-success"></i><span class=""> {!!$facility->fontAwesomeIcon !!} {{ $facility->name }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                

                    <div class="property-text">
                        <h4>Description</h4>
                        <p>{!! $property->description !!}</p>
                    </div>

                    <h4>Pictures</h4>
                    <!-- Place somewhere in the <body> of your page -->
                    <div id="aniimated-thumbnials">

                        @foreach ($propertyImages as $propertyImage)

                            <a href="{{ asset('storage/' . $propertyImage->link) }}">
                                <img class="row-cols-4 img-responsive p-1"
                                    src="{{ asset('storage/' . $propertyImage->link) }}" height="155" />
                            </a>

                        @endforeach

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
                    <h4 class="my-3">Map View</h4>
                    <div class="map-widget">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522"
                            style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 sidebar">
                    <div class="agent-widget">
                        <div class="aw-text">
                            <p>Fusce lobortis a enim eget tempus. Class aptent taciti sociosqu ad litora. Donec eget
                                efficitur ex. Donec eget dolor vitae eros feugiat tristique id vitae massa. </p>
                            <a href="#" class="readmore-btn">Contact the agent</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
