@extends('layouts.app')

@section('content')
	<h2>Verify email</h2>

	<p>To verify your email, please <a href="{{ route('verify.email', ['email' => urlencode($user->email), 'verify_token' => $user->verify_token]) }}">click here</a>!</p>
@endsection