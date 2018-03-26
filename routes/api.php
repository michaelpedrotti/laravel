<?php

Route::post('login', 'Api\LoginController@login');

Route::group(['middleware' => ['jwt.auth']], function(\Illuminate\Routing\Router $router){

	$router->any('/{controller?}/{action?}/{id?}', function($controller = 'home', $action = 'index', $id = null) use($router){
		return app_dispatch($router, $controller, $action, $id);
	});	
});
