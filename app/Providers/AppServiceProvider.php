<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	      Schema::defaultStringLength(191);

	      Blade::if('hasRole', function($expression) {

	      	if (auth()->user()) {
			      $roles = unserialize(auth()->user()->options, ['allowed_classes' => false]);

			      if ( \is_string($expression) && \in_array($expression, $roles['roles'], true) ) {
				      return $expression;
			      }

			      if (\is_array($expression)) {
				      $count = 0;
				      foreach($expression as $role) {
					      if ( \in_array($role, $roles['roles'], true) ) {
					      	$count ++;
					      }
				      }
				      return $count === \count($expression);
			      }

		      }
		      return false;
	      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
