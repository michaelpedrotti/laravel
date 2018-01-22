<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$this->call(UsersSeeder::class);
		$this->call(App\Http\Requests\AclPermissionsFormRequest::class);
		$this->call(DocumentTypesSeeder::class);
		$this->call(LicenseTypesSeeder::class);
		$this->call(StatesSeeder::class);
	}
}
