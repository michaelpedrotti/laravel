<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	
	public function authorize($ability){

		if(!app_has_permission($ability)) {
            
            if (app('request')->isXmlHttpRequest()) {
				
				$response = \Response::json([
					'success' => false,
					'msg' => 'Você não tem permissão para acessar'
				]);
            }
            else {
                $response = \Response::view('layout.errors.401', [
					'code' => 401,
					'message' => 'Você não tem permissão para acessar'
				]);
            }
		
			throw new \Illuminate\Http\Exceptions\HttpResponseException($response);	
        }
	}
	
	public function setMessage($message = '', $level = 'success'){
		
		flash($message, $level);
	}
}
