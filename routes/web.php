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

Route::group(['middleware' => ['auth']], function(\Illuminate\Routing\Router $router){
	
	$router->match(['POST', 'GET'], '/{controller?}/{action?}/{id?}', function($controller = 'home', $action = 'index', $id = null) use($router){
        
		$route = $router->getCurrentRoute();
        
        $route->uses('App\Http\Controllers\\'.studly_case($controller).'Controller@'.studly_case($action));
        
        return $router->dispatch($router->getCurrentRequest());
    });
});
