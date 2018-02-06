<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HelperController extends Controller {

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function loadCombo(Request $request) {
		
		$rsp = ['success' => false, 'options' => [], 'msg' => ''];
		
		try {
			
			$classname = '\App\Models\\'.studly_case($request->route('id'));

			if(!class_exists($classname)) {
				throw new \Exception('Model not found'.$request->route('id'));
			}

			$model = call_user_func($classname.'::getModel');

			$rsp['options'] = $model->search()
				->get()
					->pluck($request->get('text', 'name'), $request->get('value', 'id'))
						->toArray();

			$rsp['success'] = true;
		} 
		catch(\Exception $e) {
			$rsp['msg'] = $e->getMessage();
		}
		
		return Response::json($rsp);
	}
}
