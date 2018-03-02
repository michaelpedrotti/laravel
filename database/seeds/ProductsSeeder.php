<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder {

	public function run() {

		$$datetime = date('Y-m-d H:i:s');
		
		\DB::table('products')->insert([
			[
				'id' => '1',
				'name' => 'MailInspector',
				'version' => '1.5',
				'created_at' => $datetime,
				'updated_at' => $datetime,
				'uid' => 'mli',
			],
			[
				'id' => '2',
				'name' => 'MailInspector',
				'version' => '3.0',
				'created_at' => $datetime,
				'updated_at' => $datetime,
				'uid' => 'mli',
			],
			[
				'id' => '3',
				'name' => 'MailInspector',
				'version' => '4.0',
				'created_at' => $datetime,
				'updated_at' => $datetime,
				'uid' => 'mli',
			],
			[
				'id' => '4',
				'name' => 'ISS',
				'version' => '3.0',
				'created_at' => $datetime,
				'updated_at' => $datetime,
				'uid' => 'iss',
			],
			[
				'id' => '5',
				'name' => 'ISS',
				'version' => '4.0',
				'created_at' => $datetime,
				'updated_at' => $datetime,
				'uid' => 'iss',
			],
		]);
	}
}
