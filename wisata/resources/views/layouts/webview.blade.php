<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ asset('wv-assets/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('wv-assets/ripple.css') }}">
</head>
<body>

	@yield('content')

	<script type="text/javascript" src="{{ asset('wv-assets/jquery.js') }}"></script>
	<script src="{{ asset('wv-assets/ripple.js') }}"></script>
	<script src="{{ asset('wv-assets/chart.js') }}"></script>

	@yield('scripts')

</body>
</html>
