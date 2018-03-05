<?php

namespace App\Http\Middleware;

use Closure;

class FirstLogin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $response = $next($request);
        
        $user = \Auth::user();
        
        if(($user instanceof \App\User) && $user->first_login == 'Y') {

            if(!in_array(\Route::getCurrentRoute()->parameter('controller'), ['login', 'users'])) {
            
				flash('Obrigatória a troca de senha antes de prosseguir', 'warning');
                $response = redirect()->to('users/password');
            }
        }
        return $response;
    }
}
