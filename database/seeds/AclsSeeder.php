<?php

use Illuminate\Database\Seeder;

class AclsSeeder extends Seeder {

	public function run() {

		$datetime = date('Y-m-d H:i:s');


		\DB::table('acls')->insert([
			[
				'id' => '1',
				'name' => 'Administrador',
				'uid' => 'ADMIN',
				'created_at' => $datetime,
				'updated_at' => $datetime
			],
			[
				'id' => '2',
				'name' => 'Revendas',
				'uid' => 'RESELLER',
				'created_at' => $datetime,
				'updated_at' => $datetime
			],
			[
				'id' => '3',
				'name' => 'Cliente',
				'uid' => 'CUSTUMER',
				'created_at' => $datetime,
				'updated_at' => $datetime
			],
			[
				'id' => '4',
				'name' => 'Distribuidor',
				'uid' => 'DISTRIBUTOR',
				'created_at' => $datetime,
				'updated_at' => $datetime
			]
		]);
	}
}