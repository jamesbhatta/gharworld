@extends('theme.client')
@section('main-content')
<style>
    .img-local-result {
        width: 100%;
        height: 220px;
    }

    #filter-panel-opener,
    #filter-panel-closer {
        display: none;
    }
    @media only screen and (max-width: 600px) {
        .img-local-result {
            width: 100%;
            height: 140px;
        }
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

    }
</style>
<div class="my-2"></div>
<div class="container-fluid">
    <!-- Search Result Section end -->
    <section class="search-result-section spad ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 ">
                    <button id="filter-panel-opener" class="btn btn-primary rounded-0" onclick="openFilterPanel()">
                        <svg style="display: inline-flex; height: 1em;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        </span>Filter
                    </button>
    
                    <button id="filter-overlay" onclick="closeFilterPanel()" style="display: none;"></button>
                    <button id="filter-panel-closer" onclick="closeFilterPanel()"><i class="fa fa-close"></i></button>
    
                    <nav id="filter-panel">
                    <x-local-contact-filter />
                    </nav>
                </div>
                <div class="col-md-10 p-2">
                    <div class="row">
                        @forelse ($localContacts as $localContact)
                        <div class="col-md-3 col-6 mb-3 px-1 px-lg-2" style="font-size: 80%">
                            <a href="{{route('frontend.localcontact.show',$localContact)}}">
                                <div class="card localcontact-item text-center hover">
                                    <div class="pi-image">
                                        <img src="{{ $localContact->image != null ? asset('storage/' . $localContact->image) : asset('assets/img/real-estate.jpg') }}"
                                            alt="{{ $localContact->name }}" class=" img-local-result">

                                    </div>
                                    <div class="px-3 text-dark">
                                        <div class="font-weight-bold badge-info badge">
                                            {{ $localContact->profession->name }}
                                        </div>
                                        <div class="text-capitalize font-weight-bold">{{ $localContact->name }}
                                        </div>
                                        <div class="fa fa-map-marker">
                                            {{ $localContact->city->name . ', ' . $localContact->address_line }}
                                        </div>
                                        <div class="text-capitalize font-weight-bold">{{ $localContact->contact }}
                                        </div>
                                        <div>
                                            @for ($i = 1; $i <= 5; $i++) @if($localContact->overall_rating >= $i)
                                                <span class="fa fa-star text-warning"></span>
                                                @else
                                                <span class="fa fa-star-o "></span>
                                                @endif
                                                </span>
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
                    {{ $localContacts->links() }}

                </div>
            </div>
        </div>
    </section>
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