<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Certiweb | Demo',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<img width="108" src="https://demo1.certiweb.co/public/images/Gran-tierra-logo.png" style="width: 88px; margin-top: -2px;" alt="Demo" />',

    'logo_mini' => '<b style="color:#000;">CW</b>',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'red',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
      [
          'text'       => 'Empresas',
          'icon'       => 'building',
          'url'        => '#',
          'icon_color' => 'white',
          'submenu' => [
            // [
            //     'text' => 'Crear',
            //     'icon' => 'plus',
            //     'url'  => 'empresa/create/form',
            // ],
            [
                'text' => 'Listar',
                'icon' => 'list',
                'url'  => 'empresas',
            ],
          ],
      ],
        [
            'text'    => 'Módulos',
            'icon'    => 'th-large',
            'submenu' => [
                [
                    'text'    => 'Documentos Compra',
                    'icon'    => 'th-list',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Ver',
                            'icon' => 'list',
                            'url'  => 'proveedores',
                        ],
                        [
                            'text' => 'Crear',
                            'icon' => 'pencil-square-o',
                            'url'  => 'proveedor-create',
                        ],
                    ],
                ],
                [
                    'text'    => 'Seguimiento Transaccional',
                    'icon'    => 'file-text',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Ver',
                            'icon' => 'eye',
                            'url'  => 'seguimiento-facturas',
                        ],
                        [
                            'text' => 'Importar',
                            'icon' => 'upload',
                            'url'  => 'seguimiento-facturas/importar',
                        ],
                    ],
                ],
                [
                    'text'    => 'Aceptaciòn Ticket',
                    'icon'    => 'file-text',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Ver',
                            'icon' => 'eye',
                            'url'  => 'aceptacion-ticket',
                        ],
                        [
                            'text' => 'Ver',
                            'icon' => 'eye',
                            'url'  => '#',
                        ],
                    ],
                ],
                [
                    'text'    => 'Certificados Tributarios',
                    'icon'    => 'th-list',
                    'url'     => '#',
                    'submenu' => [

                        [
                            'text'    => 'IVA',
                            'icon' => 'folder-open',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'Importar',
                                    'icon' => 'upload',
                                    'url'  => 'iva-import',
                                ],
                                [
                                    'text' => 'Editar',
                                    'icon' => 'pencil',
                                    'url'  => 'iva-index',
                                ],
                                [
                                    'text' => 'Exportar',
                                    'icon' => 'download',
                                    'url'  => 'iva-export',
                                ],
                            ],
                        ],
                        [
                            'text'    => 'ICA',
                            'icon' => 'folder-open',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'Importar',
                                    'icon' => 'upload',
                                    'url'  => 'ica-import',
                                ],
                                [
                                    'text' => 'Editar',
                                    'icon' => 'pencil',
                                    'url'  => 'ica-index',
                                ],
                                [
                                    'text' => 'Exportar',
                                    'icon' => 'download',
                                    'url'  => 'ica',
                                ],
                            ],
                        ],
                        [
                            'text'    => 'RTF',
                            'icon' => 'folder-open',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'Importar',
                                    'icon' => 'upload',
                                    'url'  => 'rtf-import',
                                ],
                                [
                                    'text' => 'Editar',
                                    'icon' => 'pencil',
                                    'url'  => 'rtf-index',
                                ],
                                [
                                    'text' => 'Exportar',
                                    'icon' => 'download',
                                    'url'  => 'rtf',
                                ],
                            ],
                        ],
                        // [
                        //     'text'    => 'P. ACCIONARIA',
                        //     'icon' => 'folder-open',
                        //     'url'     => '#',
                        //     'submenu' => [
                        //         [
                        //             'text' => 'Importar',
                        //             'icon' => 'upload',
                        //             'url'  => 'accionista-import',
                        //         ],
                        //         [
                        //             'text' => 'Editar',
                        //             'icon' => 'pencil',
                        //             'url'  => 'accionista-index',
                        //         ],
                        //         [
                        //             'text' => 'Exportar',
                        //             'icon' => 'download',
                        //             'url'  => 'accionista',
                        //         ],
                        //     ],
                        // ],
                    ],
                ],
                [
                    'text'    => 'Noticias',
                    'icon'    => 'newspaper-o',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Crear',
                            'icon' => 'pencil',
                            'url'  => 'noticias/create',
                        ],
                        [
                            'text' => 'Editar',
                            'icon' => 'pencil',
                            'url'  => 'noticias',
                        ],
                        [
                            'text' => 'Ver',
                            'icon' => 'eye',
                            'url'  => 'noticias/list',
                        ],
                    ],
                ],
                [
                    'text'    => 'Notificaciones',
                    'icon'    => 'bell',
                    'url'     => '#',
                    'submenu' => [
                      [
                          'text' => 'Crear',
                          'icon' => 'pencil',
                          'url'  => 'notificaciones/create',
                      ],
                      [
                          'text' => 'Editar',
                          'icon' => 'pencil-square-o',
                          'url'  => 'notificaciones',
                      ],
                        [
                            'text' => 'Ver',
                            'icon'       => 'eye',
                            'url'  => 'notificaciones/ver',
                        ],
                    ],
                ],
            ],
        ],
        [
            'text'    => 'Usuarios',
            'icon'    => 'book',
            'url'     => '#',
            'submenu' => [
                [
                    'text' => 'Crear',
                    'icon' => 'plus',
                    'url'  => 'usuarios/create/form',
                ],
                [
                    'text' => 'Importar',
                    'icon' => 'upload',
                    'url'  => 'usuarios/import/excel',
                ],
                [
                    'text' => 'Listar',
                    'icon' => 'users',
                    'url'  => 'usuarios',
                ],
                [
                    'text' => 'Exportar',
                    'icon' => 'download',
                    'url'  => 'usuarios/export/excel',
                ],
            ],
        ],
        [
            'text'    => 'Estadísticas',
            'icon'    => 'area-chart',
            'icon_color' => 'white',
            'submenu' => [
              [
                  'text' => 'De Ingreso',
                  'icon' => 'user',
                  'url'  => 'estadisticas',
              ],
              [
                  'text' => 'De Certificados',
                  'icon' => 'file-text',
                  'url'  => 'estadisticas-certificados',
              ],
            ],
        ],
        [
                    'text'    => 'Pronto Pago',
                    'icon'    => 'clock-o',
                    'icon_color' => 'orange',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text'       => 'Facturas a vender',
                            'icon'       => 'dollar',
                            'icon_color' => 'orange',
                            'url'        => 'vender-facturas',
                        ],
                        [
                            'text' => 'En trámite',
                            'icon' => 'spinner',
                            'url'  => 'facturas-en-tramite',
                        ],
                        [
                            'text' => 'Histórico',
                            'icon' => 'calendar-check-o',
                            'url'  => 'historico-facturas',
                        ],
                        [
                            'text' => 'Perfil',
                            'icon' => 'user',
                            'url'  => 'perfil-user-facts',
                        ],
                        [
                            'text' => 'Soportes',
                            'icon' => 'life-bouy',
                            'url'  => 'facturas-soporte',
                        ],
                    ],
                ],
        [
            'text'       => 'Manual de uso',
            'icon'       => 'book',
            'icon_color' => 'white',
            'url'        => 'manual-de-uso',
            'target'     => '_blank',
        ],
        [
            'text'      => 'Politicas de uso',
            'icon'       => 'gavel',
            'icon_color' => 'white',
            'url'        => 'politicas-de-uso',
        ],
        [
            'text'       => 'Normatividad',
            'icon'       => 'handshake-o',
            'icon_color' => 'white',
            'url'        => 'normatividad',
        ],
        [
            'text'       => 'Soporte',
            'icon'       => 'life-ring',
            'icon_color' => 'white',
            'url'        => 'soporte',
        ],
        [
            'text'          => 'Documento Soporte',
            'icon'          => 'file-text',
            'icon_color'    => 'white',
            'url'           => 'documento-soporte',
        ],
        [
            'text'          => 'Editar mi Perfil',
            'icon'          => 'key',
            'icon_color'    => 'white',
            'url'           => 'editar-perfil',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
