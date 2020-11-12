@extends('theme.client')
@section('main-content')
<div class="my-2"></div>
<div class="container-fluid spad">
    <!-- Search Result Section end -->
    {{-- <section class="search-result-section "> --}}
    <div class="">
        <div class="row">

            <div class="col-md-2">
                <form action="{{route('frontend.property.search')}}" method="GET">
                    <div class="font-weight-bold text-decoration">Location</div>
                    <div class="px-2 py-2">
                        <select name="city_id" id="city" class="form-control" onchange='this.form.submit()'>
                            <option value="">Select Location</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id}}" {{"$city->id"==request()->city_id ? 'selected' : '' }}>
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
                            <label for="all">Sale/Rent</label>
                        </div>
                        <div><input type="radio" name="for" id="rent" value="rent"
                                {{request()->for=="rent" ? 'checked' : ''}} onchange='this.form.submit()'>
                            <label for="rent">Rent</label>
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
                    @if (request()->for=="rent" || request()->type=="room" )


                    <div class="font-weight-bold text-decoration">Rating</div>
                    <div class="px-2 py-2">
                        <div>
                            <input type="radio" name="overall_rating" value="5" id="5" onchange='this.form.submit()'
                                style="display: none">

                            <label for="5">
                                @for ($i = 1; $i <= 5; $i++) @if(5>= $i)
                                    <span class="fa fa-star text-warning"></span>
                                    @else
                                    <span class="fa fa-star-o "></span>
                                    @endif
                                    </span>
                                    @endfor
                            </label>
                        </div>
                        <div>
                            <input type="radio" name="overall_rating" value="4" id="4" onchange='this.form.submit()'
                                style="display: none">
                            <label for="4">
                                @for ($i = 1; $i <= 5; $i++) @if(4>= $i)
                                    <span class="fa fa-star text-warning"></span>
                                    @else
                                    <span class="fa fa-star-o "></span>
                                    @endif
                                    </span>
                                    @endfor
                                    And Up
                            </label>
                        </div>
                        <div>
                            <input type="radio" name="overall_rating" value="3" id="3" onchange='this.form.submit()'
                                style="display: none">
                            <label for="3">
                                @for ($i = 1; $i <= 5; $i++) @if(3>= $i)
                                    <span class="fa fa-star text-warning"></span>
                                    @else
                                    <span class="fa fa-star-o "></span>
                                    @endif
                                    </span>
                                    @endfor
                                    And Up
                            </label>
                        </div>
                        <div>
                            <input type="radio" name="overall_rating" value="2" id="2" onchange='this.form.submit()'
                                style="display: none">
                            <label for="2">
                                @for ($i = 1; $i <= 5; $i++) @if(2>= $i)
                                    <span class="fa fa-star text-warning"></span>
                                    @else
                                    <span class="fa fa-star-o "></span>
                                    @endif
                                    </span>
                                    @endfor
                                    And Up
                            </label>
                        </div>
                        <div>
                            <input type="radio" name="overall_rating" value="1" id="1" onchange='this.form.submit()'
                                style="display: none">
                            <label for="1">
                                @for ($i = 1; $i <= 5; $i++) @if(1>= $i)
                                    <span class="fa fa-star text-warning"></span>
                                    @else
                                    <span class="fa fa-star-o "></span>
                                    @endif
                                    </span>
                                    @endfor
                                    And Up
                            </label>
                        </div>

                    </div>
                    @endif
                </form>
            </div>


            <div class="col-md-10 pt-2 px-3">
                <div class="row">
                    @forelse ($properties as $property)
                        <div class="col-6 col-lg-3 text-color">
                            @include('theme.property-card')
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
    {{-- </section> --}}
    <!-- Search Result Section end -->
</div>

@include('theme.partials.pagefooter')
@endsection