<!-- Stylesheets -->
@production
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/mondy/css/font-awesome.min.css') }}" />
@else
<link rel="stylesheet" href="{{ asset('assets/mondy/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/mondy/css/font-awesome.min.css') }}" />
@endproduction
<link rel="stylesheet" href="{{ asset('assets/mondy/css/slicknav.min.css') }}" />

<!-- Main Stylesheets -->
<link rel="stylesheet" href="{{ asset('assets/mondy/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/mondy/css/style1.css') }}" />
{{-- <link rel="stylesheet" href="{{asset('assets/lightgallery/dist/css/lightgallery.css')}}" type="text/css"
media="screen" /> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@livewireStyles
@stack('styles')