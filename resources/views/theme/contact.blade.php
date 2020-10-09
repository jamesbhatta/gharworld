@extends('theme.client')
@section('main-content')
    @include('theme.partials.pagetopheader')
    <!-- Contact Section end -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title text-left">
                        <h2>Get in touch</h2>
                    </div>
                    <div class="contact-text">
                        <p>Donec eget efficitur ex. Donec eget dolor vitae eros feugiat tristique id vitae massa. Proin
                            vulputate congue rutrum. Fusce lobortis a enim eget tempus. Class aptent taciti sociosqu ad
                            litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Ut gravida
                            mattis magna.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="contact-info-box">
                                <div class="ci-icon">
                                    <span>CA</span>
                                </div>
                                <h4>Los Angeles</h4>
                                <p>2768 Clousson Road Los Angeles, CA 77002 </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact-info-box">
                                <div class="ci-icon">
                                    <span>TX</span>
                                </div>
                                <h4>Texas</h4>
                                <p>2768 Clousson Road Houston, TX 77002 </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact-info-box">
                                <div class="ci-icon">
                                    <span>FL</span>
                                </div>
                                <h4>Florida</h4>
                                <p>4713 Wyatt Street Boca Raton, FL 33434 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('contact.store') }}" class="contact-form" method="POST">
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
