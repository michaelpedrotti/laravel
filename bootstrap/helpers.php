<?php

if(!function_exists('app_menu')) {
    /**
     * Retorna um array, com cache, da configuração config/menu.php
     *
     * @return array
     */
	function app_menu(){

		$session = app('session.store');

		if(!$session->has('menu')) {

			$config = config('menu');

			$loop = function(&$item) use (&$loop){
				
				$item['disabled'] = false;
				
				if(isset($item['child'])) {
					foreach($item['child'] as $key => $child) {
						$loop($item['child'][$key]);	
					}
				}
			};
			
			foreach($config as $key => $item){
				$loop($config[$key]);
			}
				
			$session->put('menu', $config);
		} 

		return $session->get('menu');
	}
}