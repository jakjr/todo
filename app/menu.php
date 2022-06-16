<?php

return [

    [
        'id' => 'sobre',
        'url' => '/sobre',
        'title' => 'Sobre',
        'icon' => 'fa fa-bolt',
        'can' => true,
    ],

    [
        'id' => 'manual',
        'title' => 'Manual',
        'icon' => 'fa fa-bolt',
        'can' => true,
        'subitems' => [
            [
                'id' => 'manual_layout_da_aplicacao',
                'url' => '/manual/layout-da-aplicacao',
                'title' => 'Layout da Aplicação',
                'icon' => 'fa fa-bolt',
                'can' => true,
            ],
            [
                'id' => 'manual_layout_da_pagina',
                'url' => '/manual/layout-da-pagina',
                'title' => 'Layout da Página',
                'icon' => 'fa fa-bolt',
                'can' => true,
            ],
            [
                'id' => 'manual_menus',
                'url' => '/manual/menus',
                'title' => 'Menus',
                'icon' => 'fa fa-bolt',
                'can' => true,
            ],
            [
                'id' => 'manual_mensagens',
                'url' => '/manual/mensagens',
                'title' => 'Mensagens',
                'icon' => 'fa fa-paper-plane',
                'can' => true,
            ],
        ]
    ],

    [
        'id' => 'page1',
        'url' => '/page1',
        'title' => 'Page1',
        'icon' => 'fa fa-beer',
        'can' => false,
        'subitems' => [
            [
                'id' => 'page1.1',
                'url' => '/page1',
                'title' => 'Page1.1',
                'can' => true,
            ]
        ]
    ],
    [
        'id' => 'pagina-exemplo',
        'url' => '/pagina-exemplo',
        'title' => 'Página Exemplo',
        'icon' => 'fa fa-bolt',
        'can' => true
    ],
    [
        'id' => 'volts.index',
        'url' => '/volts',
        'title' => 'Volts',
        'icon' => 'fa fa-bolt',
        'component' => 'Volt',
        'can' => true
    ],
];

