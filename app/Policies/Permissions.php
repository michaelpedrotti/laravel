<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Permissions {

	use HandlesAuthorization;

	public function __call($name, $arguments) {
		
		return app_can($name);
	}
}