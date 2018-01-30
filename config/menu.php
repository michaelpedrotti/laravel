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
                'role' => ''
            ],
            [
                'label' => 'Usuários',
                'url' => 'users',
				'icon' => 'fa-user',
                'role' => 'USER_LISTAR'
            ]
        ],
        //'role' => ['USER_LISTAR', 'PERFIL_LISTAR']
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
                'role' => ''
            ],
			[
                'label' => 'Tipos de licenças',
                'url' => 'license-types',
                'icon' => 'fa-barcode',
                'role' => ''
            ],
			[
                'label' => 'Licenças',
                'url' => 'licenses',
                'icon' => ' fa-registered',
                'role' => ''
            ]
		]
	],
	    [
        'label' => 'Documentos',
        'url' => 'documents',
        'icon' => 'fa-file-archive-o',
        //'role' => ['USER_LISTAR', 'PERFIL_LISTAR']
    ],
];