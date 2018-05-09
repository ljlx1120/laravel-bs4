@extends('layouts.app')

@section('content')
	<h2>Home</h2>
	<div class="row">
		<div class="col-md-8">
			@hasRole(['super_admin', 'admin', 'user'])
				<p>super_admin</p>
			@endhasRole
		</div>
	</div>
@endsection
