@extends('theme.client')
@section('main-content')
    <div class="my-5"></div>
    <div class="container-fluid py-5 px-5">
        <!-- Search Result Section end -->
        {{-- <section class="search-result-section "> --}}
            <div class="">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="search-results">
                            <div class="row">
                                @forelse ($professions as $profession)
                                
                                    <div class="col-md-2 py-2">
                                        <div class="card localcontact-item text-center hover">
                                        <a href="{{route('frontend.professions.show',$profession)}}" >
                                            <div class="pi-image">
                                                <img src="{{ $profession->image != null ? asset('storage/' . $profession->image) : asset('assets/img/real-estate.jpg') }}"
                                                    alt="{{ $profession->name }}" class="image img-fluid rounded-circle"
                                                    style="width:200px; height:160px">
                                                    <div class="px-3 py-2 bg-dark">
                                                        <div class="font-weight-bold text-capitalize text-white">
                                                            {{$profession->name}}
                                                        </div>
                                                    </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                

                                @empty
                                <div class="col-md-12 text-danger text-center justify-content-center">* No data available in databale </div>
                                @endforelse
                            </div>
                            {{ $professions->links() }}
                        </div>
                    </div>
                </div>
            </div>
            {{-- </section> --}}
        <!-- Search Result Section end -->
    </div>

    @include('theme.partials.pagefooter')
@endsection

