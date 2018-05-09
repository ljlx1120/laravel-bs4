<div class="row justify-content-center mt-3">
	<div class="col-sm-8 col-10 offset-1">
		<h3>Create a new account</h3>
		<form class="form-inline mt-2" action="{{ route('register') }}" method="post">
			@csrf

			<input type="email" class="form-control ml-2 mt-2" name="email" placeholder="Email address" value="{{ old('email') }}" required>

			<input type="text" class="form-control ml-2 mt-2" name="name" placeholder="Username" value="{{ old('name') }}" required>

			<input type="password" class="form-control ml-2 mt-2" name="password" placeholder="Password" required>

			<input type="password" class="form-control ml-2 mt-2" name="password_confirmation" placeholder="Password confirmation" required>
			<button class="btn btn-outline-primary btn-lg ml-3 mt-2" type="submit">Create</button>

		</form>
	</div>
</div>



