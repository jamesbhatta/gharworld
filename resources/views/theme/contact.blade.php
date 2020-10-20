@extends('theme.client')
@section('main-content')
<!-- Contact Section end -->
<section class="contact-section spad">
    <div class="container">
        <h3 class="pt-5 text-center">Get In Touch</h3>
        <div class="row">
            <div class="col-md-4 text-center my-5 py-3">
                @isset($profile)
                <h4>
                    <div class="text-center"><img src="{{asset('storage/'.$profile->logo) }}" alt="GharWorld Logo"
                            style="height:90px;"></div>
                    <div class="py-2 text-center">{{$profile->name}}</div>
                    <div class="py-2 fa fa-map-marker text-center"> {{$profile->address}}</div><br>
                    <div class="py-2 fa fa-phone text-center"><a href="tel:{{$profile->contact}}" class="text-dark">
                            {{$profile->contact}} </a> </div>
                    <div class="py-2 fa fa-envelope text-center"><a href="mailto:{{$profile->email}}" class="text-dark">
                            {{$profile->email}}</a> </div>
                    
                    <div class="py-2 text-info">
                        <span class="text-center  "><a href="{{$profile->facebook}}"> <i class="fa fa-facebook btn btn-primary"></i></a> </span>
                        <span class="text-center  "><a href="tel:{{$profile->whatsapp}}"> <i class="fa fa-whatsapp btn text-white" style="background-color: green"></i></a> </span>
                        <span class="py-2 "><a href="{{$profile->twitter}}"><i class="fa fa-twitter btn btn-primary"></i></a> </span>
                        <span class="py-2 "><a href="{{$profile->instagram}}"><i class="fa fa-instagram btn btn-danger"></i></a> </span>
                        <span class="text-center "><a href="{{$profile->linkedin}}"> <i class="fa fa-linkedin btn btn-primary"></i></a> </span>
                        <span class="py-2"><a href="{{$profile->youtube}}"><i class="fa fa fa-youtube btn btn-danger"></i></a> </span>
                    </div>
                </h4>
                @endisset
            </div>
            <div class="col-md-8">
                <form action="{{ route('forntend.contact.store') }}" class="contact-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="@error('name')is-invalid @enderror" placeholder="Your name" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <input type="email" name="email" class="@error('email')is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Your e-mail" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="subject" class="@error('subject')is-invalid @enderror"
                                value="{{ old('subject') }}" placeholder="Subject" required>
                            @error('subject')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <textarea name="message" class="@error('message') is-invalid @enderror"
                                placeholder="Message" required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <button class="site-btn sb-big">Send message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section end -->

@include('theme.partials.pagefooter')
@endsection