<?php

return [

    [
        'label' => 'Administração',
        'url' => '',
        'icon' => 'fa-sitemap',
        'child' => [

            [
                'label' => 'Perfil',
                'url' => 'acls',
                'icon' => 'fa-lock',
                'acl' => 'ACLS_LIST'
            ],
            [
                'label' => 'Usuários',
                'url' => 'users',
				'icon' => 'fa-user',
                'acl' => 'USERS_LIST'
            ]
        ],
        'acl' => ['ACLS_LIST', 'USERS_LIST']
    ],
	[
		'label' => 'Configurações',
        'url' => '',
        'icon' => 'fa-gears',
        'child' => [
			
			[
                'label' => 'Produtos',
                'url' => 'products',
                'icon' => 'fa-cubes',
                'acl' => 'PRODUCTS_LIST'
            ],
			[
                'label' => 'Tipos de licenças',
                'url' => 'license-types',
                'icon' => 'fa-barcode',
                'acl' => 'LICENSETYPES_LIST'
            ]
		]
	],
	[
        'label' => 'Documentos',
        'url' => 'documents',
        'icon' => 'fa-file-archive-o',
        'acl' => ['DOCUMENTS_LIST']
    ],
	[
        'label' => 'Distribuidores',
        'url' => 'distributors',
        'icon' => 'fa-truck',
        'acl' => []
    ],
	[
        'label' => 'Revendas',
        'url' => 'resellers',
        'icon' => 'fa-money',
        'acl' => []
    ],
	[
        'label' => 'Clientes',
        'url' => 'clients',
        'icon' => 'fa-users',
        'acl' => []
    ],
	[
		'label' => 'Licenças',
		'url' => 'licenses',
		'icon' => ' fa-registered',
		'acl' => 'LICENSES_LIST'
	]
];