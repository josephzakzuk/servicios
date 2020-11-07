<!DOCTYPE html>
<html>
<head>
<title>Servicios</title>
</head>
<link href="{{ asset('/bootstrap_css/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/js/lib/jqueryui/jquery-ui.min.css') }}" rel="stylesheet">
<link href="{{ asset('/js/lib/toastr/toastr.min.css') }}" rel="stylesheet">
<link href="{{ asset('/js/lib/alertify/css/alertify.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('fontawsome/fontawesome-free-5.14.0-web/css/all.min.css') }}">
<body style='background-image: url({{asset("img/backgrounds/tileset.png")}})'>
	
		@include('layouts.navbar')
		

		<div class="container">
		
			@yield('contenido')
			
			<div id="ohsnap"></div>
			
		</div>

<!--scripts-->
<script src="{{ asset('js/lib/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('/bootstrap_css/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/lib/jqueryui/jquery-ui.js') }}"></script>
<script src="{{ asset('js/load.js') }}"></script>
<script src="{{ asset('js/ajaxForm.js') }}"></script>
<script src="{{ asset('js/lib/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/lib/alertify/alertify.min.js') }}"></script>
@yield('scripts')
</body>
</html>