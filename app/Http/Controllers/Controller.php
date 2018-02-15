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
			app_abort(401, 'Você não tem permissão para acessar');
        }
	}
	
	public function setMessage($message = '', $level = 'success'){
		
		flash($message, $level);
	}
}
