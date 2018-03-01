<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder {

	public function run() {

		
		\DB::table('products')->insert([
			[
				'id' => '1',
				'name' => 'MailInspector',
				'version' => '1.5',
				'created_at' => '2018-02-19 19:15:46',
				'updated_at' => '2018-02-19 19:15:46',
				'deleted_at' => '',
				'uid' => 'mli',
			],
			[
				'id' => '2',
				'name' => 'MailInspector',
				'version' => '3.0',
				'created_at' => '2018-02-22 20:08:14',
				'updated_at' => '2018-02-22 20:08:14',
				'deleted_at' => '',
				'uid' => 'mli',
			],
			[
				'id' => '3',
				'name' => 'MailInspector',
				'version' => '4.0',
				'created_at' => '2018-02-22 20:08:53',
				'updated_at' => '2018-02-22 20:08:53',
				'deleted_at' => '',
				'uid' => 'mli',
			],
			[
				'id' => '4',
				'name' => 'ISS',
				'version' => '3.0',
				'created_at' => '2018-02-23 11:32:58',
				'updated_at' => '2018-02-23 11:32:58',
				'deleted_at' => '',
				'uid' => 'iss',
			],
			[
				'id' => '5',
				'name' => 'ISS',
				'version' => '4.0',
				'created_at' => '2018-02-23 11:43:57',
				'updated_at' => '2018-02-23 11:43:57',
				'deleted_at' => '',
				'uid' => 'iss',
			],
		]);
	}
}
