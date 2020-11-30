@extends('theme.client')
@section('main-content')
<style>
    .img-local-result {
        width: 100%;
        height: 220px;
    }

    @media only screen and (max-width: 600px) {
        .img-local-result {
            width: 100%;
            height: 140px;
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
                    <x-local-contact-filter />
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
