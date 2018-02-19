<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {

	public function run() {
		
		$datetime = date('Y-m-d H:i:s');

		\DB::table('users')->insert(
			[
				'id' => '1',
				'name' => 'Administrador',
				'email' => 'admin@hscbrasil.com.br',
				'password' => bcrypt('admin'),
				'remember_token' => str_random(10),
				'created_at' => $datetime,
				'updated_at' => $datetime,
			]
		);
	}
}