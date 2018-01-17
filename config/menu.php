<?php

return [

    [
        'label' => 'Administração',
        'url' => '',
        'icon' => 'fa-circle-o',
        'child' => [

            [
                'label' => 'Perfil',
                'url' => 'profile',
                'icon' => 'fa-fa-chevron-right ',
                'role' => ''
            ],
            [
                'label' => 'Usuários',
                'url' => 'users',
				'icon' => 'fa-fa-chevron-right ',
                'role' => 'USER_LISTAR'
            ]
        ],
        //'role' => ['USER_LISTAR', 'PERFIL_LISTAR']
    ],
    [
        'label' => 'Safra',
        'url' => '',
        'icon' => 'fa-leaf',
        'child' => [

            [
                'label' => 'Fazendas e talhões',
                'url' => 'fazendas',
                'icon' => 'fa-chevron-right ',
                'role' => ''
            ],
            [
                'label' => 'Cultivares',
                'url' => 'cultivares',
                'icon' => 'fa-chevron-right ',
                'role' => ''
            ]
        ],
        'role' => []
    ]
];