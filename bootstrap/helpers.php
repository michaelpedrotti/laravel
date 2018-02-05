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

				$item['disabled'] = isset($item['acl']) && !empty($item['acl'])  ? !app_has_permission($item['acl']) : false;
				
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

if(!function_exists('app_date')) {
    /**
     * Formata uma data de diferentes locales
     *
     * @return string
     */
	function app_date($value = '', $input = 'Y-m-d H:i:s', $output = 'd/m/Y 00:00:00'){

		if(!empty($value)) {
		
			$datetime = \DateTime::createFromFormat($input, $value);
			if($datetime !== false) {
				return $datetime->format($output);
			}
		}
		return '';
	}
}

if(!function_exists('app_bytes_to_size')) {
    /**
     * Formata para padrão humano bytes
     *
     * @return string
     */
	function app_bytes_to_size($bytes){

		$units = array('bytes','Kb','Mb','Gb','Tb','Pb','Eb','Zb','Yb');
		$step = 1024;
		$i = 0;
		while (($bytes / $step) > 0.9) {
			$bytes = $bytes / $step;
			$i++;
		}
		return round($bytes, 2).' '.$units[$i];
	}
}

if(!function_exists('app_has_permission')) {
	
	/**
     * Verifica se o usuário ter permissão para acessar um recurso do sistema
     *
	 * @param string $ability Permissão a ser testada
     * @return bool
     */
	function app_has_permission($ability){
		
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
		
		return $bool;	
	}
}

if(!function_exists('app_fetch')) {
    /**
     * Retorna uma lista para combobox com label e value
     *
	 * @link https://laravel.com/docs/5.5/helpers
     * @return array
     */
	function app_fetch($classname = '', $label = 'name', $value = 'id'){

		$model = call_user_func('\App\Models\\'.studly_case($classname).'::getModel');
		
		return $model->search()->pluck($label, $value)->prepend('Selecione', '')->toArray();
	}
}