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

				$item['disabled'] = isset($item['acl']) && !empty($item['acl'])  ? !app_can($item['acl']) : false;
				
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

if(!function_exists('app_can')) {
	
	/**
     * Verifica se o usuário ter permissão para acessar um recurso do sistema
     *
	 * @param string $ability Permissão a ser testada
     * @return bool
     */
	function app_can($ability){
		
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
		
		return $model->search()
				->pluck($label, $value)
					->prepend('Selecione', '')
						->toArray();
	}
}

if(!function_exists('app_abort')) {
    /**
     * Retorna uma mensagem de erro padrão para ajax ou uma view com o layout 
	 * dependendo do tipo de requisição
     *
	 * @param number $code 
	 * @param string $message 
	 * @link https://laravel.com/docs/5.5/helpers
     * @throws Illuminate\Http\Exceptions\HttpResponseException
     */
	function app_abort($code, $message){
		
		if (app('request')->isXmlHttpRequest()) {
				
			$response = \Response::json([
				'success' => false,
				'code' => $code,
				'msg' => $message
			]);
		}
		else {
			$response = \Response::view('layout.errors.401', [
				'code' => $code,
				'message' => $message
			]);
		}

		throw new \Illuminate\Http\Exceptions\HttpResponseException($response);	
	}
}

if(!function_exists('app_has')){
	
	function app_has(&$var, $key) {
	
		if(is_array($var) && array_key_exists($key, $var)) {
			$value = &$var[$key];
		}
		elseif(is_object($var) && property_exists($var, $key)){
			$value = &$var->{$key};
		}
		else {
			$value = null;
		}
		
		return (is_numeric($value) || !empty($value));
	}
}
