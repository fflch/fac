<?php


$conveniados =  [
    [
        'text' => 'Listar',
        'url'  => '/conveniados',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/conveniados/create'
    ],
];

$associados =  [
    [
        'text' => 'Listar',
        'url'  => '/associados',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/associados/create',
    ],
];

$vendas =  [
    [
        'text' => 'Listar',
        'url'  => '/vendas',
    ],
    /* [
        'text' => 'Cadastrar',
        'url'  => '/vendas/create',
    ], */
];

$relatorios =  [
    [
        'text' => 'Conveniados',
        'url'  => '/',
    ],

    [
        'text' => 'Associados',
        'url'  => '/',
    ],
];

$right_menu = [
    [
        'text' => '<i class="fas fa-hard-hat"></i>',
        'title' => 'Logs',
        'target' => '_blank',
        'url' => config('app.url') . '/logs',
        'align' => 'right',
        'can' => 'admin',
    ],
];


return [
    'title' => 'Filosofia Atlético Clube',
    'dashboard_url' => config('app.url'), # deprecado
    'skin' => env('USP_THEME_SKIN', 'uspdev'),
    'session_key' => 'laravel-usp-theme',

    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/loginType',

    'menu' => [
        [
            'text'    => 'Associados',
            'submenu' => $associados,
            'can'     => 'admin'
        ],
        [
            'text'    => 'Conveniados',
            'submenu' => $conveniados,
            'can'     => 'admin',
        ],
        [
            'text'    => 'Vendas',
            'submenu' => $vendas,
            'can'     => 'admin'
        ],
        [
            'text'    => 'Relatórios',
            'submenu' => $relatorios,
            'can'     => 'admin'
        ],
        [
            'text'    => 'Cadastrar Venda',
            'url' => config('app.url') . '/vendas/create',
            'can'     => 'conveniado'
        ],
    ],

    'right_menu' => $right_menu,
];