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
            ],
			[
                'label' => 'Contatos',
                'url' => 'contacts',
                'icon' => 'fa-book',
                'acl' => 'CONTACTS_LIST'
            ]
		],
		'acl' => ['PRODUCTS_LIST', 'LICENSETYPES_LIST']
	],
	[
        'label' => 'Extreme Update',
        'url' => '',
        'icon' => 'fa-refresh',
		'child' => [
			
			[
                'label' => 'Assinaturas de SPAM',
                'url' => 'upd-rules',
                'icon' => 'fa-paint-brush',
                'acl' => 'UPDRULES_LIST'
            ],
			[
				
				'label' => 'Smart Defender',
                'url' => 'upd-sdfndrs',
                'icon' => 'fa-shield',
                'acl' => ''	
			]
		],
        'acl' => ['UPDRULES_LIST']
    ],
	[
        'label' => 'Documentos',
        'url' => 'documents',
        'icon' => 'fa-file-archive-o',
        'acl' => 'DOCUMENTS_LIST'
    ],
	[
        'label' => 'Distribuidores',
        'url' => 'distributors',
        'icon' => 'fa-truck',
        'acl' => 'DISTRIBUTORS_LIST'
    ],
	[
        'label' => 'Revendas',
        'url' => 'resellers',
        'icon' => 'fa-money',
        'acl' => 'RESELLERS_LIST'
    ],
	[
        'label' => 'Clientes',
        'url' => 'clients',
        'icon' => 'fa-users',
        'acl' => 'CLIENTS_LIST'
    ],
	[
		'label' => 'Licenças',
		'url' => 'licenses',
		'icon' => ' fa-registered',
		'acl' => 'LICENSES_LIST'
	],
	    [
        'label' => 'Dashboards',
        'url' => '',
        'icon' => 'fa-tachometer',
        'child' => [

            [
                'label' => 'Smart Defender',
                'url' => 'dashboards/smartdefender',
                'icon' => 'fa-shield',
                'acl' => 'ADMIN'
            ],
			[
                'label' => 'Hardware',
                'url' => 'dashboards/hardware',
                'icon' => 'fa-server',
                'acl' => 'ADMIN'
            ]
        ],
        'acl' => ['ADMIN']
    ],
];