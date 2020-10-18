@extends('theme.client')

@section('main-content')
	<!-- Intro Section end -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 order-lg-1">
					<div class="about-text text-center">
						<h3>WHY CHOOSE US?</h3>
						<p>Gharworld.com brings together property information - location, price, pictures, interactive maps and property features through dynamic website, mobile interface and SMS. We welcome the participation from real estate players - sellers, renters, agents, builders, developers, investors for dissemination of information in trustworthy environment.</p>
						
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