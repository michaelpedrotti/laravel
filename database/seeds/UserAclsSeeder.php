<?php

use Illuminate\Database\Seeder;

class UserAclsSeeder extends Seeder {

	public function run() {

		\DB::table('user_acls')->insert([
			[
				'id' => '1',
				'user_id' => '1',
				'acl_id' => '1',
			],
		]);
	}
}