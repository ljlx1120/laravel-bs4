<nav class="navbar sticky-top navbar-expand-lg navbar-default">
	<a class="navbar-brand" href="{{ route('home') }}">XingApps</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
	        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-bars" aria-hidden="true"></i>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			@if(! Auth::check())
				<li class="nav-item">
					<a class="nav-link {{ Route::current()->getName() === 'welcome' ? 'active' : '' }}" href="/">Welcome</a>
				</li>
			@endif
			@if(Auth::check())
				<li class="nav-item">
					<a class="nav-link {{ Route::current()->getName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Route::current()->getName() === 'projects' ? 'active' : '' }}" href="{{ route('projects') }}">Projects</a>
				</li>
			@endif
			<li class="nav-item">
				<a class="nav-link {{ Route::current()->getName() === 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ Route::current()->getName() === 'about' ? 'active' : '' }}" href="{{ route('about') }}">About</a>
			</li>
		</ul>

		@hasRole('admin')
			<div class="dropdown-divider"></div>
			<div class="mx-auto">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link {{ Route::current()->getName() === 'admin' ? 'active' : '' }}" href="{{ route('admin') }}">Admin</a></li>
				</ul>
			</div>
		@endhasRole

		<div class="form-inline my-2 my-lg-0">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				@if(! Auth::check())
					<form id="login-form" method="post" action="{{ route('login') }}">
						@csrf
						<input class="form-control mr-sm-2" type="email" name="email" placeholder="Email">
						<input class="form-control mr-sm-2" type="password" name="password" placeholder="Password">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log In</button>
					</form>

					<li class="nav-item mr-3" id="login-toggle">
						<a class="nav-link"><i class="fas fa-sign-in-alt" class="tooltip" title="Log in"></i></a>
					</li>

					<form id="forget-form" method="post" action="{{ route('password.email') }}">
						@csrf
						<input class="form-control mr-sm-2" type="email" name="email" placeholder="Email">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Find</button>
					</form>

					<li class="nav-item" id="forget-toggle">
						<a class="nav-link"><i class="fas fa-unlock-alt" class="tooltip" title="Forget password?"></i></a>
					</li>
				@endif

				@if(Auth::check())
					<li class="nav-item dropdown show">
						<a class="nav-link dropdown-toggle btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
							<div class="dropdown-divider"></div>
							<form action="{{ route('logout') }}" method="post">
								@csrf
								<button class="dropdown-item" type="submit">Logout <i class="fas fa-sign-out-alt ml-5"></i></button>
							</form>

						</div>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>