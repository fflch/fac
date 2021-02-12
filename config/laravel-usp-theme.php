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
    [
        'text' => 'Cadastrar',
        'url'  => '/vendas/create',
    ],
];

$relatorios =  [
    [
        'text' => 'Conveniados',
        'url'  => '/relatorios/conveniados',
    ],

    [
        'text' => 'Associados',
        'url'  => '/relatorios/associados',
    ],
];

return [
    'title' => 'Filosofia Atlético Clube',
    'dashboard_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => [
        [
            'text'    => 'Associados',
            'submenu' => $associados,
        ],
        [
            'text'    => 'Conveniados',
            'submenu' => $conveniados,
        ],
        [
            'text'    => 'Vendas',
            'submenu' => $vendas,
        ],
        [
            'text'    => 'Relatórios',
            'submenu' => $relatorios,
        ],
    ]
];