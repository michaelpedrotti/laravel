<?php

use Illuminate\Database\Seeder;

class LicenseTypesSeeder extends Seeder {

	public function run() {

		$datetime = date('Y-m-d H:i:s');
		\DB::table('license_types')->insert([
			[
				'id' => '1',
				'name' => 'Padrão',
				'created_at' => '2018-01-18 10:58:52',
				'updated_at' => '2018-01-18 10:58:52',
				'deleted_at' => '',
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'id' => '2',
				'name' => 'NFR',
				'created_at' => '2018-01-18 10:58:52',
				'updated_at' => '2018-01-18 10:58:52',
				'deleted_at' => '',
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'id' => '3',
				'name' => 'Trial',
				'created_at' => '2018-01-18 10:58:52',
				'updated_at' => '2018-01-18 10:58:52',
				'deleted_at' => '',
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
		]);
	}

}
