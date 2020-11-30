@extends('theme.client')

@push('styles')
<style>
    #filter-panel-opener,
    #filter-panel-closer {
        display: none;
    }

    @media only screen and (max-width: 600px) {
        #filter-panel-opener {
            display: block;
        }

        #filter-panel {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            margin-left: -250px;
            background-color: #fff;
            z-index: 1000;
            padding: 20px;


            overflow-y: scroll;
            scroll-behavior: smooth;

            -webkit-box-shadow: 1px 4px 8px -1px #8B8B8B;
            box-shadow: 1px 4px 8px -1px #8B8B8B;

            transition: all .5s ease;
        }

        #filter-overlay {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(192, 192, 192, 0.13);
            z-index: 1000;
        }

        #filter-panel-closer {
            position: fixed;
            bottom: 10px;
            right: 10px;
            height: 50px;
            width: 50px;
            border: none;
            background-color: #fff;
            color: #1e88e5;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            overflow: hidden;
            z-index: 1000;

            -webkit-box-shadow: 3px 3px 22px -8px rgba(155, 157, 163, 1);
            -moz-box-shadow: 3px 3px 22px -8px rgba(155, 157, 163, 1);
            box-shadow: 3px 3px 22px -8px rgba(155, 157, 163, 1);

            transition: all .5s ease;
        }
    }

</style>
@endpush

@section('main-content')
<div class="my-0 my-md-2"></div>
<div class="container-fluid spad">
    <!-- Search Result Section end -->
    {{-- <section class="search-result-section "> --}}
    <div class="">
        <div class="row">
            {{-- filter panel --}}
            <div class="col-md-2">
                <button id="filter-panel-opener" class="btn btn-primary rounded-0" onclick="openFilterPanel()">
                    <svg style="display: inline-flex; height: 1em;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    </span>Filter
                </button>

                <button id="filter-overlay" onclick="closeFilterPanel()"></button>
                <button id="filter-panel-closer" onclick="closeFilterPanel()"><i class="fa fa-close"></i></button>

                <nav id="filter-panel">
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
                            <div><input type="radio" name="type" id="real-estate" value="real-estate" {{request()->type=="real-estate" ? 'checked' : ''}} onchange='this.form.submit()'>
                                <label for="real-estate">Land/House</label>
                            </div>
                            <div><input type="radio" name="type" id="house" value="house" {{request()->type=="house" ? 'checked' : ''}} onchange='this.form.submit()'>
                                <label for="house">House</label>
                            </div>
                            <div><input type="radio" name="type" id="land" value="land" {{request()->type=="land" ? 'checked' : ''}} onchange='this.form.submit()'>
                                <label for="land">Land</label>
                            </div>
                            <div><input type="radio" name="type" id="room" value="room" {{request()->type=="room" ? 'checked' : ''}} onchange='this.form.submit()'>
                                <label for="room">Room</label>
                            </div>
                        </div>
                        <hr>
                        <div class="font-weight-bold text-decoration">Property For</div>
                        <div class="px-3 py-2">
                            <div><input type="radio" name="for" id="all" value="all" {{request()->for=="all" ? 'checked' : ''}} onchange='this.form.submit()'>
                                <label for="all">Sale/Rent</label>
                            </div>
                            <div><input type="radio" name="for" id="rent" value="rent" {{request()->for=="rent" ? 'checked' : ''}} onchange='this.form.submit()'>
                                <label for="rent">Rent</label>
                            </div>
                            <div><input type="radio" name="for" id="sale" value="sale" {{request()->for=="sale" ? 'checked' : ''}} onchange='this.form.submit()'>
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
                                <input type="radio" name="overall_rating" value="5" id="5" onchange='this.form.submit()' style="display: none">

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
                                <input type="radio" name="overall_rating" value="4" id="4" onchange='this.form.submit()' style="display: none">
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
                                <input type="radio" name="overall_rating" value="3" id="3" onchange='this.form.submit()' style="display: none">
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
                                <input type="radio" name="overall_rating" value="2" id="2" onchange='this.form.submit()' style="display: none">
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
                                <input type="radio" name="overall_rating" value="1" id="1" onchange='this.form.submit()' style="display: none">
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
                </nav>
            </div>


            <div class="col-md-10 pt-2 px-3">
                <div class="row">
                    <div style="height: 400px;"></div>
                    @forelse ($properties as $property)
                    <div class="col-6 col-lg-3 text-color px-1 px-lg-2">
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

@push('scripts')
<script>
    function openFilterPanel() {
        document.getElementById('filter-panel').style.marginLeft = 0;
        document.getElementById('filter-panel-closer').style.display = 'flex';
        document.getElementById('filter-overlay').style.display = 'block';
    }

    function closeFilterPanel() {
        document.getElementById('filter-panel').style.marginLeft = "-250px";
        document.getElementById('filter-panel-closer').style.display = 'none';
        document.getElementById('filter-overlay').style.display = 'none';
    }

</script>
@endpush
