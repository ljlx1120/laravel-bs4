<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'XingApps') }}</title>

	<script src="{{ asset('js/app.js') }}" defer></script>

	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
	@include('layouts.topnav')

	@if(! in_array(Route::current()->getName(),['password.request', 'password.reset', 'login', 'register'], true))
		@include('messages.success')

		@include('messages.error')

		@include('messages.warning')
	@endif

	@if(! Auth::check() && Route::current()->getName() === 'welcome')
		@include('forms.register-form')
	@endif

	<main class="container-fluid">
		<div class="px-md-5 py-2">
			@yield('content')
		</div>
	</main>
</div>

@yield('scripts')

</body>
</html>
