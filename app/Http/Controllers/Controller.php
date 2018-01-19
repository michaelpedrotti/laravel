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
		
		$bool = false;
		$array = (array)$ability;
		
        $sessao = app('session.store');

        if($sessao->has('acl')) {

            if(in_array($sessao->get('acl'), $array)) {
                $bool = true;
            } 
        }
    
        if ($sessao->has('permissions')) {
           
            foreach($sessao->get('permissions') as $permission){       
                if (in_array($permission, $array)) {
                    $bool = true;
                }
            }
        }

		if(!$bool) {
            
            if (app('request')->isXmlHttpRequest()) {
				
				$response = \Response::json([
					'success' => false,
					'msg' => 'Você não tem permissão para acessar'
				]);
            }
            else {
                $response = \Response::view('layout/error', [
					'code' => 401,
					'message' => 'Você não tem permissão para acessar'
				]);
            }
		
			throw new \Illuminate\Http\Exceptions\HttpResponseException($response);	
        }
		
		return true;
	}
	
	public function setMessage($message = '', $level = 'success'){
		
		flash($message, $level);
	}
}
