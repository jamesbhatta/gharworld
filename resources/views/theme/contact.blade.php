@extends('theme.client')
@section('main-content')
    <!-- Contact Section end -->
    <section class="contact-section spad my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title text-center">
                        <h3 class="text-center">Get in touch</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('forntend.contact.store') }}" class="contact-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <input type="text" name="name" value="{{ old('name') }}" class="@error('name')is-invalid @enderror"
                            placeholder="Your name" required>
							@error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="col-lg-4">
                        <input type="email" name="email"  class="@error('email')is-invalid @enderror" value="{{ old('email') }}" placeholder="Your e-mail" required>
						@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
                    <div class="col-lg-4">
                        <input type="text" name="subject" class="@error('subject')is-invalid @enderror" value="{{ old('subject') }}" placeholder="Subject" required>
						@error('subject')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
                    <div class="col-lg-12">
						<textarea name="message" class="@error('message') is-invalid @enderror" placeholder="Message" required>{{ old('message') }}</textarea>
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
    </section>
    <!-- Contact Section end -->

    @include('theme.partials.pagefooter')
@endsection
