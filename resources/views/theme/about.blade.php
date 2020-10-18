@extends('theme.client')

@section('main-content')
	<!-- Intro Section end -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 order-lg-2">
					<img src="{{asset('assets/mondy/img/about/4.jpg')}}" alt="">
				</div>
				<div class="col-lg-6 order-lg-1">
					<div class="about-text">
						<h3>A young team that is here to help you get your dream home.</h3>
						<p>Donec eget efficitur ex. Donec eget dolor vitae eros feugiat tristique id vitae massa. Proin vulputate congue rutrum. Fusce lobortis a enim eget tempus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Ut gravida mattis magna, non varius lorem sodales nec. In libero orci, ornare non nisl a, auctor euismod purus. Morbi pretium interdum vestibulum. Fusce nec eleifend ipsum. Sed non blandit tellus. </p>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro Section end -->

	<!-- Sell Section -->
	<section class="sell-section ">
		<div class="sell-warp spad set-bg" data-setbg="{{asset('assets/mondy/img/sell-bg.jpg')}}">
			<div class="container text-white">
				<div class="section-title">
					<h2>Selling your place is easy</h2>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="sell-item">
							<div class="si-icon"><span>01.</span></div>
							<h3>Search</h3>
							<p>Donec eget efficitur ex. Donec eget dolor vitae eros feugiat tristique id vitae massa. Proin vulputate congue rutrum. Fusce lobortis a enim eget tempus. Class aptent taciti sociosqu.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="sell-item">
							<div class="si-icon"><span>02.</span></div>
							<h3>Compare</h3>
							<p>Donec eget efficitur ex. Donec eget dolor vitae eros feugiat tristique id vitae massa. Proin vulputate congue rutrum. Fusce lobortis a enim eget tempus. Class aptent taciti sociosqu.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="sell-item">
							<div class="si-icon"><span>03.</span></div>
							<h3>Connect</h3>
							<p>Donec eget efficitur ex. Donec eget dolor vitae eros feugiat tristique id vitae massa. Proin vulputate congue rutrum. Fusce lobortis a enim eget tempus. Class aptent taciti sociosqu.</p>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</section>
	<!-- Sell Section end -->



@include('theme.partials.pagefooter')
@endsection