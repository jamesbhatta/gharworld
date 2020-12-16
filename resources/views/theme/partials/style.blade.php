<!-- Stylesheets -->
@production
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
{{-- <link rel="stylesheet" href="{{ asset('assets/mondy/css/font-awesome.min.css') }}" /> --}}
@else
<link rel="stylesheet" href="{{ asset('assets/mondy/css/bootstrap.min.css') }}" />
@endproduction
<link rel="stylesheet" href="{{ asset('assets/mondy/css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/mondy/css/slicknav.min.css') }}" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" /> --}}
<!-- Main Stylesheets -->
<link rel="stylesheet" href="{{ asset('assets/mondy/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/mondy/css/style1.css') }}" />
{{-- <link rel="stylesheet" href="{{asset('assets/lightgallery/dist/css/lightgallery.css')}}" type="text/css"
media="screen" /> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@livewireStyles
@stack('styles')