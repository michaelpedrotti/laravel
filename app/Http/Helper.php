<?php

namespace App\Http;

/**
 * Description of Helper
 *
 * @author michael
 */
class Helper {

	public static function menu(){
		
		$session = app('session.store');

        if(!$session->has('menu')) {

            $config = config('menu');

			array_walk_recursive($config, function(&$array, $key){
				
				// Permissão não contiver a role
				$array['disabled'] = (array_key_exists('role', $array) && $array['role'] == 'USER_LISTAR') ? true : false;
			});
			
			$session->set('menu', $config);
        } 
        
        return $session->get('menu');
	}
}
