<?php

namespace App\Listeners;

use \Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;

/**
 * Injeta algumas configurações do PHP no Javascript no objeto APP
 */
class PhpToJs {
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Handle the event.
     *
     * @param  SetConfigSistem  $event
     * @return void
     */
    public function handle() {
        
		$route = \Route::getCurrentRoute();
        
        $prefix = $route->getPrefix();
        $controller = $route->parameter('controller', 'default');
        $action = $route->parameter('action', 'index');
        $key = $route->parameter('id', null);
		
        Javascript::put([
			'token' => csrf_token(),
			'uri' => $controller . '/' . $action,
            'base_url' => asset('/'),
			'current_url' => asset('/') . $controller . '/' . $action . ($key ? '/' . $key : ''),
			'current_controller' => asset('/') . $controller,
            'controller' => $controller,
			'action' => $action,
            'key' => $key,
        ]);
    }
}
