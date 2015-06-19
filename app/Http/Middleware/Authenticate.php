<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate {

	
	public function handle($request, Closure $next){
		
	if (\Session::has('usuario')){

			return $next($request);

		}
		
		else{
			
			return redirect()->guest('auth/login');
		}
	}

}
