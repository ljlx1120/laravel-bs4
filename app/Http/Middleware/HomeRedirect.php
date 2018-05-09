<?php

	namespace App\Http\Middleware;

	use Closure;
	use Illuminate\Support\Facades\Auth;

	class HomeRedirect
	{
		/**
		 * Handle an incoming request.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \Closure  $next
		 * @return mixed
		 */
		public function handle($request, Closure $next)
		{
			if (! auth()->check()) {
				return redirect()->to('/');
			}

			if (auth()->user()->verify_token !== null || auth()->user()->status !== 1) {
				Auth::logout();
				$request->session()->flash('warning', 'Please verify your email first');
				return redirect()->to('/');
			}

			return $next($request);
		}
	}
