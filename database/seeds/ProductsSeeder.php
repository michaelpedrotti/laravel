<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder {

	public function run() {

		$datetime = date('Y-m-d H:i:s');
		
		\DB::table('products')->insert([
			[
				'id' => 1,
				'name' => 'Internet Secure Suite',
				'version' => '4.x ',
				'created_at' => $datetime,
				'updated_at' => $datetime,
				'uid' => 'iss',
			],
			[
				'id' => 2,
				'name' => 'MailInspector',
				'version' => '4.x',
				'created_at' => $datetime,
				'updated_at' => $datetime,
				'uid' => 'mli',
			],
		]);
	}
}
