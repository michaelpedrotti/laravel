<?php

use Illuminate\Database\Seeder;

class ProductAttributesSeeder extends Seeder {

	public function run() {

		\DB::table('product_attributes')->insert([
			[
				'product_id' => '5',
				'name' => 'Cache de Conteúdo Dinâmico',
				'key' => 'DynamicContentCache',
				'default' => '0',
			],
			[
				'product_id' => '5',
				'name' => 'Any Where Protection',
				'key' => 'AnywhereProtection',
				'default' => '0',
			],
			[
				'product_id' => '5',
				'name' => 'Catálogos da HSC',
				'key' => 'CATALOGS',
				'default' => '0',
			],
			[
				'product_id' => '4',
				'name' => 'Catálogos da HSC',
				'key' => 'CATALOGS',
				'default' => '0',
			],
		]);
	}
}