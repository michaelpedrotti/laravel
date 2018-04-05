<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller {

	
	public function login(Request $request){
		
		$output = [];   
        
        try {
            
            if(!$request->isMethod('post')) {
                throw new \Exception('invalid_method');   
            }
            
			// Busca a licença por vcode
			$model = \App\Models\Licenses::query()
				->where('verification_code', $request->get('vcode'))
					->first();
			
			if(empty($model)) {
				throw new \Exception('invalid_credentials');
			}
			
			// Tenta casar com o nome de registro do cliente
			if(strtoupper($model->Customer->User->name) != strtoupper($request->get('username'))) {
				throw new \Exception('invalid_credentials');
			}
			
			// Verifica se o IP é o mesmo que o de registro
			$bool = false;
			$addr = $request->ip();
			
			$model->Networks->each(function($model) use(&$bool, $addr){

		
				if($model->network ==  $addr){
					$bool = true;
					return false;
				}
				elseif(preg_match('/\//', $model->network) && app_cidr_range($model->network, $addr)) {
					$bool = true;
					return false;
				}
			});
			
			if($bool === false){
				throw new \Exception('unregistered_network');
			}
			
			$authenticatable = \App\User::find($model->Customer->User->id);
			
            $token = JWTAuth::fromUser($authenticatable);
            
            if (!$token) {
                
                $output['error'] = "invalid_credentials";
            }
            else {
                
                $output['token'] = $token;
            }
        } 
        catch(JWTException $e) {
            $output['error'] = 'invalid_credentials';
        }
        catch(\Exception $e) {
            $output['error'] = $e->getMessage();
        }
               
        return \Response::json($output);
	}
}