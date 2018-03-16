<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class HomeController extends Controller {

	public function markAlert(Request $request){
		
		$model = \App\Models\AlertUsers::query()
			->where('user_id', \Auth::user()->id)
			->where('alert_id', $request->route('id'))
				->get()
					->first();
		
		if(!$model){
			app_abort('404', __('Mensagem de alert não foi encontrada'));
		}
		
		$model->readed = 'Y';
		$model->save();
		
		return Response::redirectTo(url($model->Alert->route));
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
