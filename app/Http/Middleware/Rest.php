<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Transforma os response view e redirect para reponse json para utilizar em API
 * Rest
 * 
 * @autor Michael Pedrotti <michael.pedrotti@jointecnologia.com.br>
 * @version 1.1
 */
class Rest {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $response = $next($request);
        
        if($response instanceof \Illuminate\Http\RedirectResponse) {
            
            $data = $request->session()->get('flash_notification', []);
            $data['success'] = true;
            
            $response = \Response::json($data);
        }
        else if(property_exists($response, 'original') && $response->original instanceof \Illuminate\View\View) {
            
            $data = $response->original->getData();
            $data['success'] = true;
            
            $response = \Response::json($data);            
        }
        
        return $response;
    }
}
