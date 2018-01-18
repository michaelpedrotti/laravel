<?php

use Illuminate\Database\Seeder;

class AclPermissionsSeeder extends Seeder {

	public function run() {


		\DB::table('acl_permissions')->insert([
			[
				'id' => '1',
				'acl_id' => '1',
				'permission_id' => '4',
			],
			[
				'id' => '2',
				'acl_id' => '1',
				'permission_id' => '3',
			],
			[
				'id' => '3',
				'acl_id' => '1',
				'permission_id' => '2',
			],
			[
				'id' => '4',
				'acl_id' => '1',
				'permission_id' => '1',
			]
		]);
	}
}
