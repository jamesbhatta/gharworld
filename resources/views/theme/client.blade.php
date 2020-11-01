<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>GharWorld</title>
	<meta charset="UTF-8">
	<meta name="description" content="Gharworld.com is a platform to disseminate real estate industry information. We provide comprehensive detail on real estate properties which are for sale or rent, including current news and information about real estate market.">
	<meta name="keywords" content="real estate, rrom rent, house rent, house sale, land rent, land sale">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link href="favicon.ico" rel="shortcut icon" />

	<!-- Google font -->
	<link
		href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900%7cRoboto:400,400i,500,500i,700,700i&display=swap"
		rel="stylesheet">
        @include('theme.partials.style')

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	@include('theme.partials.header')

	<!--
		 Real Estate
	Room rent
	Local Contacts { search field: location  and category } 
-->
@yield('main-content')
@include('theme.partials.script')

</body>

</html>