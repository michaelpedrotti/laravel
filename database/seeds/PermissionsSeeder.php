<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder {

	public function run() {


		\DB::table('permissions')->insert([
			[
				'id' => '1',
				'permission' => 'USERS_LIST',
				'desc' => 'Listar usuários',
			],
			[
				'id' => '2',
				'permission' => 'USERS_ADD',
				'desc' => 'Adicionar usuário',
			],
			[
				'id' => '3',
				'permission' => 'USERS_EDIT',
				'desc' => 'Editar usuário',
			],
			[
				'id' => '4',
				'permission' => 'USERS_REM',
				'desc' => 'Remover usuário',
			],
			[
				'id' => '5',
				'permission' => 'USERS_SHOW',
				'desc' => 'Visualizar usuário',
			],
			[
				'id' => '6',
				'permission' => 'ACLS_LIST',
				'desc' => 'Listar perfis',
			],
			[
				'id' => '7',
				'permission' => 'ACLS_ADD',
				'desc' => 'Adicionar perfil',
			],
			[
				'id' => '8',
				'permission' => 'ACLS_EDIT',
				'desc' => 'Editar perfil',
			],
			[
				'id' => '9',
				'permission' => 'ACLS_REM',
				'desc' => 'Remover perfil',
			],
			[
				'id' => '10',
				'permission' => 'ACLS_SHOW',
				'desc' => 'Visualizar perfil',
			],
			[
				'id' => '11',
				'permission' => 'PERMISSIONS_LIST',
				'desc' => 'Listar permissões',
			],
			[
				'id' => '12',
				'permission' => 'PERMISSIONS_ADD',
				'desc' => 'Adicionar permissão',
			],
			[
				'id' => '13',
				'permission' => 'PERMISSIONS_EDIT',
				'desc' => 'Editar permissão',
			],
			[
				'id' => '14',
				'permission' => 'PERMISSIONS_REM',
				'desc' => 'Remover permissão',
			],
			[
				'id' => '15',
				'permission' => 'PERMISSIONS_SHOW',
				'desc' => 'Visualizar permissão',
			],
			[
				'id' => '16',
				'permission' => 'PRODUCTS_LIST',
				'desc' => 'Listar produtos',
			],
			[
				'id' => '17',
				'permission' => 'PRODUCTS_ADD',
				'desc' => 'Adicionar produto',
			],
			[
				'id' => '18',
				'permission' => 'PRODUCTS_EDIT',
				'desc' => 'Editar produto',
			],
			[
				'id' => '19',
				'permission' => 'PRODUCTS_REM',
				'desc' => 'Remover produto',
			],
			[
				'id' => '20',
				'permission' => 'PRODUCTS_SHOW',
				'desc' => 'Visualizar produto',
			],
			[
				'id' => '21',
				'permission' => 'LICENSETYPES_LIST',
				'desc' => 'Listar tipos de licença',
			],
			[
				'id' => '22',
				'permission' => 'LICENSETYPES_ADD',
				'desc' => 'Adicionar tipo de licença',
			],
			[
				'id' => '23',
				'permission' => 'LICENSETYPES_EDIT',
				'desc' => 'Editar tipo de licença',
			],
			[
				'id' => '24',
				'permission' => 'LICENSETYPES_REM',
				'desc' => 'Remover tipo de licença',
			],
			[
				'id' => '25',
				'permission' => 'LICENSETYPES_SHOW',
				'desc' => 'Visualizar tipo de licença',
			],
			[
				'id' => '26',
				'permission' => 'LICENSES_LIST',
				'desc' => 'Listar licenças',
			],
			[
				'id' => '27',
				'permission' => 'LICENSES_ADD',
				'desc' => 'Adicionar licença',
			],
			[
				'id' => '28',
				'permission' => 'LICENSES_EDIT',
				'desc' => 'Editar licença',
			],
			[
				'id' => '29',
				'permission' => 'LICENSES_REM',
				'desc' => 'Remover licença',
			],
			[
				'id' => '30',
				'permission' => 'LICENSES_SHOW',
				'desc' => 'Visualizar licença',
			],
			[
				'id' => '31',
				'permission' => 'DOCUMENTS_LIST',
				'desc' => 'Listar documentos',
			],
			[
				'id' => '32',
				'permission' => 'DOCUMENTS_ADD',
				'desc' => 'Adicionar documento',
			],
			[
				'id' => '33',
				'permission' => 'DOCUMENTS_EDIT',
				'desc' => 'Editar documento',
			],
			[
				'id' => '34',
				'permission' => 'DOCUMENTS_REM',
				'desc' => 'Remover documento',
			],
			[
				'id' => '35',
				'permission' => 'DOCUMENTS_SHOW',
				'desc' => 'Visualizar documento',
			],
			[
				'id' => '36',
				'permission' => 'DOCUMENTS_DOWN',
				'desc' => 'Download de documentos',
			],
		]);
	}
}