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
				'password' => '$2y$10$KSQkZXbgkDsV6YOybPmRROOlnGja3BV37RCboBgbHhPYpo6GKV8Gq',
				'remember_token' => 'fZrFRicG6OtAJYpQbrd82PZSqxHWVUVmp5Gd3mjJzdmnJctBxzChoEr4jbKm',
				'created_at' => $datetime,
				'updated_at' => $datetime,
			
		]);
	}
}