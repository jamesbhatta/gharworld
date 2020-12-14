<!--====== Javascripts & Jquery ======-->
@production
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
	integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
	integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

@else
<script src="{{asset('assets/mondy/js/jquery-3.2.1.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
<script src="{{asset('assets/mondy/js/bootstrap.min.js')}}">
</script>
@endproduction
<script src="{{asset('assets/mondy/js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('assets/mondy/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/mondy/js/main.js')}}"></script>
{{-- <script src="{{asset('assets/lightgallery/dist/js/lightgallery.min.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@livewireScripts
@stack('scripts')