<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller {

	
	public function login(Request $request){
		
		$output = ['success' => false];   
        
        try {
            
            if(!$request->isMethod('post')) {
                throw new \Exception('Allow method POST');   
            }
            
			$model = \App\Models\Licenses::query()
				->where('verification_code', $request->get('vcode'))
					->first();
			
			if(empty($model)) {
				throw new \Exception('Dados do login incorretos');
			}
			
			if($model->Customer->User->name != $request->get('username')) {
				throw new \Exception('Dados do login incorretos');
			}
			
			$authenticatable = \App\User::find($model->Customer->User->id);
			
            $token = JWTAuth::fromUser($authenticatable);
            
            if (!$token) {
                
                $output['error'] = "invalid_credentials";
            }
            else {
                
                $output['success'] = true;
                $output['token'] = $token;
            }
        } 
        catch(JWTException $e) {
            $output['error'] = 'invalid_credentials';
        }
        catch(\Exception $e) {
            $output['msg'] = $e->getMessage();
        }
               
        return \Response::json($output);
	}
}