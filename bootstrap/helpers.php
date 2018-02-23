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

			$loop = function(&$current, &$parent, $index) use (&$loop){

				if(app_has($current, 'acl') && !app_can($current['acl'])) {
					unset($parent[$index]);
				}
				
				if(isset($current['child'])) {
					foreach($current['child'] as $key => $child) {
						$loop($child, $current, $key);	
					}
					
					if(empty($current['child'])) unset($parent[$index]);
				}
			};
			
			foreach($config as $key => $current){
				$loop($current, $config, $key);
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
	function app_fetch($classname = '', $label = 'name', $value = 'id', $filter = []){

		$model = call_user_func('\App\Models\\'.studly_case($classname).'::getModel');
		
		return $model->search($filter)
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

if(!function_exists('app_model')) {
	
	function app_model($classname, $id = 0){

		return call_user_func('App\Models\\'.studly_case($classname).'::findOrNew', $id);
	}
}

if(!function_exists('app_dispatch')){
	
	function app_dispatch($router, $controller, $action, $id) {
	
		$route = $router->getCurrentRoute();
		$route->name($controller.'.'.$action);
		
		$controller = 'App\Http\Controllers\\'.studly_case($controller).'Controller';
		$action = studly_case($action);
		
		if(!class_exists($controller)) {
			abort(404, 'Controller not found');
		}
		
		if(!method_exists($controller, $action)) {
			abort(404, 'Action not found');
		}
		
		$route->uses($controller.'@'.$action);

		return $router->dispatch($router->getCurrentRequest());
	}
}