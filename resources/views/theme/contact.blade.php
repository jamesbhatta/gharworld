@extends('theme.client')
@section('main-content')
<!-- Contact Section end -->
<section class="contact-section spad">
    <div class="container">
        <h3 class="pt-5 text-center">Get In Touch</h3>
        <div class="row">
            <div class="col-md-4 text-center my-5 py-3">
                @isset($profile)
                <x-company-contact-component/>
                @endisset
            </div>
            <div class="col-md-7">
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