@extends('theme.client')
@section('main-content')
<div class="my-1"></div>
<div class="container-fluid spad">
    <!-- Search Result Section end -->
    <section class="search-result-section">
        <div class="container-fluid">
            <div class="row justify-content-center">
                {{-- <div class="row justify-content-center"
                    style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);"> --}}
                <div class="card shadow mt-3" style="width: 50rem;">
                    <div class="row p-3">
                        <div class="col-md-4 text-center">

                            <img src="{{$localContact->image!=null ? asset('storage/' . $localContact->image) : asset('assets/img/person-avatar.png')}}"
                                class="img-thumbnail rounded-circle img-fluid" alt="{{ $localContact->name }}"
                                style="width:35rem; height:14rem;">
                            <h6 class="text-capitalize m-2">
                                <span class="badge-pill badge-info px-3  py-1">
                                    {{ $localContact->profession->name}}
                                </span>
                            </h6>

                            <h4 class="">{{ $localContact->name }}</h4>
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
                        <div class="col-md-7 mt-2 ml-3 pt-5 font-weight-bold text-black">
                            <h4 class="py-3">Contact Details</h4>
                            <h5 class="bg-light p-3">
                                <div><i class="fa fa-map-marker py-2"> </i>
                                    {{ $localContact->city->name.", ".$localContact->address_line }}
                                </div>
                                <div>
                                    <i class="fa fa-phone p-2 bg-warning rounded-pill text-white"><a
                                            href="tel:{{ $localContact->contact}}"> {{ $localContact->contact}}</a>
                                    </i>
                                </div>
                                @if ($localContact->email!=null)

                                <div>
                                    <i class="fa fa-envelope-o py-2 "> </i><a href="mailto:{{ $localContact->email}}"
                                        class="text-dark"> {{ $localContact->email}}</a>
                                </div>
                                @endif
                                @if ($localContact->qualification != null)
                                <div>
                                    <i class="fa fa-graduation-cap py-2"> </i>{{ $localContact->qualification}}</a>
                                </div>
                                @endif
                                <div>
                            </h5>
                        </div>
                    </div>

                    @isset($localContact->about)
                    <hr>
                    <div class="row p-3">
                        <div class="col-md-12">
                            <h4 class="pb-3">Discription</h4>
                            {!! $localContact->about !!}
                        </div>
                    </div>
                    @endisset
                </div>

            </div>

            <div class="d-flex justify-content-center mt-5">
                <div class="col-md-8">
                    @if ($localContact->overall_rating!=null OR Auth::check())
                    <h5 class="h5-responsive mb-2">Rating and Review</h5>
                    @endif
                    @auth
                    <livewire:rating-review :model="$localContact" />
                    @endauth
                    <livewire:review-list :model="$localContact" />
                </div>
            </div>

        </div>
    </section>
    <!-- Search Result Section end -->
</div>

@include('theme.partials.pagefooter')
@endsection