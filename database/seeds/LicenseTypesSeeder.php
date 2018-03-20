<?php

use Illuminate\Database\Seeder;

class LicenseTypesSeeder extends Seeder {

	public function run() {

		$datetime = date('Y-m-d H:i:s');
		
		\DB::table('license_types')->insert([
			[
				'id' => 1,
				'name' => 'Network',
				'product_id' => 1,
				'val' => 1,
				'created_at' => $datetime,
				'updated_at' => $datetime
			],
			[
				'id' => 2,
				'name' => 'Enterprise',
				'product_id' => 1,
				'val' => 2,
				'created_at' => $datetime,
				'updated_at' => $datetime
			],
			[
				'id' => 3,
				'name' => 'Free',
				'product_id' => 1,
				'val' => 3,
				'created_at' => $datetime,
				'updated_at' => $datetime
			],
			[
				'id' => 4,
				'name' => 'Network',
				'product_id' => 2,
				'val' => 1,
				'created_at' => $datetime,
				'updated_at' => $datetime
			],
			[
				'id' => 5,
				'name' => 'Enterprise',
				'product_id' => 2,
				'val' => 2,
				'created_at' => $datetime,
				'updated_at' => $datetime
			],
			[
				'id' => 6,
				'name' => 'ISP',
				'product_id' => 2,
				'val' => 3,
				'created_at' => $datetime,
				'updated_at' => $datetime
			]
		]);
	}
}