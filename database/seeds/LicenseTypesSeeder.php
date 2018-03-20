<?php

use Illuminate\Database\Seeder;

class LicenseTypesSeeder extends Seeder {

	public function run() {

		\DB::table('license_types')->insert([
			[
				'id' => 1,
				'name' => 'Network',
				'product_id' => 1,
				'val' => 1,
			],
			[
				'id' => 2,
				'name' => 'Enterprise',
				'product_id' => 1,
				'val' => 2,
			],
			[
				'id' => 3,
				'name' => 'Free',
				'product_id' => 1,
				'val' => 3,
			],
			[
				'id' => 4,
				'name' => 'Network',
				'product_id' => 2,
				'val' => 1,
			],
			[
				'id' => 5,
				'name' => 'Enterprise',
				'product_id' => 2,
				'val' => 2,
			],
			[
				'id' => 6,
				'name' => 'ISP',
				'product_id' => 2,
				'val' => 3,
			]
		]);
	}
}