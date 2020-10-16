@extends('theme.client')
@section('main-content')
<div class="my-5"></div>
<div class="container-fluid py-5 px-5">
    <!-- Search Result Section end -->
    {{-- <section class="search-result-section "> --}}
    <div class="">
        <div class="row py-5">

            <div class="col-md-2">
                <form action="{{route('frontend.property.search')}}" method="GET">
                    <div class="font-weight-bold text-decoration">Location</div>
                    <div class="px-2 py-2">
                        <select name="city_id" id="city" class="form-control" onchange='this.form.submit()'>
                            <option value="">Select Location</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id}}" {{"$city->id"==request()->city_id ? 'selected' : '' }} >
                                {{ $city->name}}
                            </option>
                            @endforeach


                        </select>
                    </div>
                    <hr>
                    <div class="font-weight-bold text-decoration">Property type</div>
                    <div class="px-3 py-2">
                        <div><input type="radio" name="type" id="real-estate" value="real-estate"
                                {{request()->type=="real-estate" ? 'checked' : ''}} onchange='this.form.submit()'>
                            <label for="real-estate">Land/House</label>
                        </div>
                        <div><input type="radio" name="type" id="house" value="house"
                                {{request()->type=="house" ? 'checked' : ''}} onchange='this.form.submit()'>
                            <label for="house">House</label>
                        </div>
                        <div><input type="radio" name="type" id="land" value="land"
                                {{request()->type=="land" ? 'checked' : ''}} onchange='this.form.submit()'>
                            <label for="land">Land</label>
                        </div>
                        <div><input type="radio" name="type" id="room" value="room"
                                {{request()->type=="room" ? 'checked' : ''}} onchange='this.form.submit()'>
                            <label for="room">Room</label>
                        </div>
                    </div>
                    <hr>
                    <div class="font-weight-bold text-decoration">Property For</div>
                    <div class="px-3 py-2">
                        <div><input type="radio" name="for" id="all" value="all"
                                {{request()->for=="all" ? 'checked' : ''}} onchange='this.form.submit()'>
                            <label for="all" >Sale/Rent</label>
                        </div>
                        <div><input type="radio" name="for" id="rent" value="rent"
                                {{request()->for=="rent" ? 'checked' : ''}} onchange='this.form.submit()'>
                            <label for="rent" >Rent</label>
                        </div>
                        <div><input type="radio" name="for" id="sale" value="sale"
                                {{request()->for=="sale" ? 'checked' : ''}} onchange='this.form.submit()'>
                            <label for="sale">Sale</label></div>
                    </div>
                    <hr>
                    {{-- <div class="font-weight-bold text-decoration">Price</div>
                    <div class="mx-2 my-2">
                        <div class="row form-group">
                            <input type="number" min="0" name="min"
                                class=" col-sm-12 form-control input-sm my-2 text-right" id="min" placeholder="Minimum">
                            <input type="number" min="0" name="max" class="col-sm-12 form-control text-right" id="max"
                                placeholder="Maximum">
                        </div>
                    </div>
                    <hr> --}}
                    <div class="font-weight-bold text-decoration">Rating</div>
                    <div class="px-2 py-2">

                        <div class="row">
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star checked text-warning p-1"></span>
                        </div>
                        <div class="row">
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star text-secondary p-1"> And Up</span>

                        </div>
                        <div class="row">
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star text-secondary p-1"></span>
                            <span class="fa fa-star text-secondary p-1"> And Up</span>
                        </div>
                        <div class="row">
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star text-secondary p-1"></span>
                            <span class="fa fa-star text-secondary p-1"></span>
                            <span class="fa fa-star text-secondary p-1"> And Up</span>

                        </div>
                        <div class="row">
                            <span class="fa fa-star checked text-warning p-1"></span>
                            <span class="fa fa-star text-secondary p-1"></span>
                            <span class="fa fa-star text-secondary p-1"></span>
                            <span class="fa fa-star text-secondary p-1"></span>
                            <span class="fa fa-star text-secondary p-1"> And Up</span>

                        </div>

                    </div>
                </form>
            </div>


            <div class="col-md-10 p-2">
                <div class="">
                    <div class="row">
                        @forelse ($properties as $property)
                        <div class="col-md-3 text-color">
                            <a href="{{ route('frontend.property.show', $property) }}">
                                <div class="card property-item hover text-dark">

                                    <img src="{{ $property->image != null ? asset('storage/' . $property->image) : asset('assets/img/real-estate.jpg') }}"
                                        alt="{{ $property->title }}" class="image img-fluid" style="width:100%; height:auto">
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
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- </section> --}}
    <!-- Search Result Section end -->
</div>

@include('theme.partials.pagefooter')
@endsection