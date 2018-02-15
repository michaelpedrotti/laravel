<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder {

	public function run() {

		\DB::table('permissions')->insert([
			[
				'id' => '1',
				'permission' => 'USERS_LIST',
				'desc' => 'Usuário - Listagem',
			],
			[
				'id' => '2',
				'permission' => 'USERS_ADD',
				'desc' => 'Usuário - Adicionar',
			],
			[
				'id' => '3',
				'permission' => 'USERS_EDIT',
				'desc' => 'Usuário - Editar',
			],
			[
				'id' => '4',
				'permission' => 'USERS_REM',
				'desc' => 'Usuário - Remover',
			],
			[
				'id' => '5',
				'permission' => 'USERS_SHOW',
				'desc' => 'Usuário - Visualizar',
			],
			[
				'id' => '6',
				'permission' => 'ACLS_LIST',
				'desc' => 'Perfil - Listagem',
			],
			[
				'id' => '7',
				'permission' => 'ACLS_ADD',
				'desc' => 'Perfil - Adicionar',
			],
			[
				'id' => '8',
				'permission' => 'ACLS_EDIT',
				'desc' => 'Perfil - Editar',
			],
			[
				'id' => '9',
				'permission' => 'ACLS_REM',
				'desc' => 'Perfil - Remover',
			],
			[
				'id' => '10',
				'permission' => 'ACLS_SHOW',
				'desc' => 'Perfil - Visualizar',
			],
			[
				'id' => '11',
				'permission' => 'PERMISSIONS_LIST',
				'desc' => 'Permissão - Listagem',
			],
			[
				'id' => '12',
				'permission' => 'PERMISSIONS_ADD',
				'desc' => 'Permissão - Adicionar',
			],
			[
				'id' => '13',
				'permission' => 'PERMISSIONS_EDIT',
				'desc' => 'Permissão - Editar',
			],
			[
				'id' => '14',
				'permission' => 'PERMISSIONS_REM',
				'desc' => 'Permissão - Remover',
			],
			[
				'id' => '15',
				'permission' => 'PERMISSIONS_SHOW',
				'desc' => 'Permissão - Visualizar',
			],
			[
				'id' => '16',
				'permission' => 'PRODUCTS_LIST',
				'desc' => 'Produto - Listagem',
			],
			[
				'id' => '17',
				'permission' => 'PRODUCTS_ADD',
				'desc' => 'Produto - Adicionar',
			],
			[
				'id' => '18',
				'permission' => 'PRODUCTS_EDIT',
				'desc' => 'Produto - Editar',
			],
			[
				'id' => '19',
				'permission' => 'PRODUCTS_REM',
				'desc' => 'Produto - Remover',
			],
			[
				'id' => '20',
				'permission' => 'PRODUCTS_SHOW',
				'desc' => 'Produto - Visualizar',
			],
			[
				'id' => '21',
				'permission' => 'LICENSETYPES_LIST',
				'desc' => 'Tipo de licença - Listagem',
			],
			[
				'id' => '22',
				'permission' => 'LICENSETYPES_ADD',
				'desc' => 'Tipo de licença - Adicionar',
			],
			[
				'id' => '23',
				'permission' => 'LICENSETYPES_EDIT',
				'desc' => 'Tipo de licença - Editar',
			],
			[
				'id' => '24',
				'permission' => 'LICENSETYPES_REM',
				'desc' => 'Tipo de licença - Remover',
			],
			[
				'id' => '25',
				'permission' => 'LICENSETYPES_SHOW',
				'desc' => 'Tipo de licença - Visualizar',
			],
			[
				'id' => '26',
				'permission' => 'LICENSES_LIST',
				'desc' => 'Licença - Listagem',
			],
			[
				'id' => '27',
				'permission' => 'LICENSES_ADD',
				'desc' => 'Licença - Adicionar',
			],
			[
				'id' => '28',
				'permission' => 'LICENSES_EDIT',
				'desc' => 'Licença - Editar',
			],
			[
				'id' => '29',
				'permission' => 'LICENSES_REM',
				'desc' => 'Licença - Remover',
			],
			[
				'id' => '30',
				'permission' => 'LICENSES_SHOW',
				'desc' => 'Licença - Visualizar',
			],
			[
				'id' => '31',
				'permission' => 'DOCUMENTS_LIST',
				'desc' => 'Documento - Listagem',
			],
			[
				'id' => '32',
				'permission' => 'DOCUMENTS_ADD',
				'desc' => 'Documento - Adicionar',
			],
			[
				'id' => '33',
				'permission' => 'DOCUMENTS_EDIT',
				'desc' => 'Documento - Editar',
			],
			[
				'id' => '34',
				'permission' => 'DOCUMENTS_REM',
				'desc' => 'Documento - Remover',
			],
			[
				'id' => '35',
				'permission' => 'DOCUMENTS_SHOW',
				'desc' => 'Documento - Visualizar',
			],
			[
				'id' => '36',
				'permission' => 'DOCUMENTS_DOWN',
				'desc' => 'Documento - Download',
			],
			[
				'id' => '37',
				'permission' => 'DISTRIBUTORS_LIST',
				'desc' => 'Distribuidor - Listagem',
			],
			[
				'id' => '38',
				'permission' => 'DISTRIBUTORS_ADD',
				'desc' => 'Distribuidor - Adicionar',
			],
			[
				'id' => '39',
				'permission' => 'DISTRIBUTORS_EDIT',
				'desc' => 'Distribuidor - Editar',
			],
			[
				'id' => '40',
				'permission' => 'DISTRIBUTORS_SHOW',
				'desc' => 'Distribuidor - Visualizar',
			],
			[
				'id' => '41',
				'permission' => 'DISTRIBUTORS_REM',
				'desc' => 'Distribuidor - Remover',
			],
			[
				'id' => '42',
				'permission' => 'CLIENTS_LIST',
				'desc' => 'Cliente - Listagem',
			],
			[
				'id' => '43',
				'permission' => 'CLIENTS_ADD',
				'desc' => 'Cliente - Adicionar',
			],
			[
				'id' => '44',
				'permission' => 'CLIENTS_EDIT',
				'desc' => 'Cliente - Editar',
			],
			[
				'id' => '45',
				'permission' => 'CLIENTS_SHOW',
				'desc' => 'Cliente - Visualizar',
			],
			[
				'id' => '46',
				'permission' => 'CLIENTS_REM',
				'desc' => 'Cliente - Remover',
			],
			[
				'id' => '47',
				'permission' => 'RESELLERS_LIST',
				'desc' => 'Revenda - Listagem',
			],
			[
				'id' => '48',
				'permission' => 'RESELLERS_ADD',
				'desc' => 'Revenda - Adicionar',
			],
			[
				'id' => '49',
				'permission' => 'RESELLERS_EDIT',
				'desc' => 'Revenda - Editar',
			],
			[
				'id' => '50',
				'permission' => 'RESELLERS_SHOW',
				'desc' => 'Revenda - Visualizar',
			],
			[
				'id' => '51',
				'permission' => 'RESELLERS_REM',
				'desc' => 'Revenda - Remover',
			],
		]);
	}
}
