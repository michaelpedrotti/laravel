<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['auth', 'csrf', 'first-login']], function(\Illuminate\Routing\Router $router){
	
	$router->match(['POST', 'GET'], '/contacts/{entity}/{fk_id}/{action?}/{id?}', function($entity = null, $fk_id = null, $action = 'index', $id = null) use($router){

		$router->getCurrentRoute()->defaults('controller', 'contacts/'.$entity.'/'.$fk_id);

		return app_dispatch($router, 'contacts', $action, $id);
	});

	
	$router->match(['POST', 'GET'], '/{controller?}/{action?}/{id?}', function($controller = 'home', $action = 'index', $id = null) use($router){
		return app_dispatch($router, $controller, $action, $id);
    });
});
