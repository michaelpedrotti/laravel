<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function test(){
		
		$menus = config('menu');
		$mapper = array();

		$loop = function(&$item, &$parent = null) use (&$loop, &$mapper){

			if(!empty($item['url'])) $mapper[$item['url']] = &$item;
			
			
			$item['disabled'] = false;// Verificar ACL do usuário
			$item['expended'] = false;
			$item['parent'] = &$parent;

			if(isset($item['child'])) {
				foreach($item['child'] as $key => $child) {
					$loop($item['child'][$key], $item, $mapper);	
				}
			}
		};

		$root = array('Hello World');

		foreach($menus as $key => $item){
			$loop($menus[$key], $root);
		}
		
		
		$loop = function(&$item) use (&$loop){
			$item['expended'] = true;
			if(isset($item['parent'])) {
				$loop($item['parent']);
			}
		};
		
		$loop($mapper['products']);
		
		dd($menus);
	}
	
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home.index');
	}

}
