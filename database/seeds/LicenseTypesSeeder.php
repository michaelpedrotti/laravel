<?php

use Illuminate\Database\Seeder;

class LicenseTypesSeeder extends Seeder {

	public function run() {

		\DB::table('license_types')->insert([
			[
				'id' => '1',
				'name' => 'Network',
				'product_id' => '1',
				'val' => '1',
			],
			[
				'id' => '2',
				'name' => 'Enterprise',
				'product_id' => '1',
				'val' => '2',
			],
			[
				'id' => '3',
				'name' => 'ISP',
				'product_id' => '1',
				'val' => '3',
			],
			[
				'id' => '4',
				'name' => 'Network',
				'product_id' => '2',
				'val' => '1',
			],
			[
				'id' => '5',
				'name' => 'Enterprise',
				'product_id' => '2',
				'val' => '2',
			],
			[
				'id' => '6',
				'name' => 'ISP',
				'product_id' => '2',
				'val' => '3',
			],
			[
				'id' => '7',
				'name' => 'Network',
				'product_id' => '3',
				'val' => '1',
			],
			[
				'id' => '8',
				'name' => 'Enterprise',
				'product_id' => '3',
				'val' => '2',
			],
			[
				'id' => '9',
				'name' => 'ISP',
				'product_id' => '3',
				'val' => '3',
			],
			[
				'id' => '10',
				'name' => 'Network',
				'product_id' => '4',
				'val' => '1',
			],
			[
				'id' => '11',
				'name' => 'Enterprise',
				'product_id' => '4',
				'val' => '2',
			],
			[
				'id' => '12',
				'name' => 'Free',
				'product_id' => '4',
				'val' => '3',
			],
			[
				'id' => '13',
				'name' => 'Network',
				'product_id' => '5',
				'val' => '1',
			],
			[
				'id' => '14',
				'name' => 'Enterprise',
				'product_id' => '5',
				'val' => '2',
			],
			[
				'id' => '15',
				'name' => 'Free',
				'product_id' => '5',
				'val' => '3',
			],
		]);
	}
}