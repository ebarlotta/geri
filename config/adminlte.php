<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'Empresa',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    //'logo' => '<b>&nbsp;&nbsp;&nbsp;   Enzo</b>',
    //'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    //'logo_img' => asset('images/avatars/Enzo.jpeg'),
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    //'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => false,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => false,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        /*[
            'text' => 'search',
            'search' => true,
            'topnav' => true,
        ],*/
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => 'pages',
            'url'         => 'admin/pages',
            'icon'        => 'far fa-fw fa-file',
            'label'       => 4,
            'label_color' => 'success',
        ],
        ['header' => 'account_settings'],
        [
            'text' => 'Administración',
            'url'  => 'tags',
            'icon' => 'fas fa-fw fa-building',
            'submenu' => [
                [
                    'text' => 'Usuarios x Empresa',
                    'url'  => 'admin/empresausuarios',
                    'icon' => 'fas fa-fw fa-users',
                ],
                [
                    'text' => 'Usuarios x Módulo',
                    'url'  => 'admin/modulousuarios',
                    'icon' => 'fas fa-fw fa-user-cog',
                ],
                [
                    'text' => 'Módulos x Empresa',
                    'url'  => 'admin/empresamodulos',
                    'icon' => 'fas fa-fw fa-chart-pie',
                ],
                [
                    'text' => 'Gestión de empresas',
                    'url'  => 'admin/empresagestion',
                    'icon' => 'fas fa-fw fa-building',
                ],
            ],
        ],
        [
            'text' => 'Configuraciones',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-cogs',
            'submenu' => [
                [
                    'text' => 'Beneficios',
                    'url'  => 'admin/beneficios',
                    'icon' => 'fas fa-fw fa-usd',
                ],
                [
                    'text' => 'Estado de Camas',
                    'url'  => 'admin/estadocama',
                    'icon' => 'fas fa-fw fa-bed',
                ],
                [
                    'text' => 'Habitaciones',
                    'url'  => 'admin/habitaciones',
                    'icon' => 'fas fa-fw fa-bed',
                ],
                [
                    'text' => 'Personas',
                    'icon' => 'fas fa-fw fa-cogs',
                    'submenu' => [
                        [
                            'text' => 'Gestión de Personas',
                            'url'  => 'admin/personas',
                            'icon' => 'fas fa-fw fa-card',
                        ],
                        [
                            'text' => 'Tipos de Documentos',
                            'url'  => 'admin/tiposdedocumentos',
                            'icon' => 'fas fa-fw fa-card',
                        ],
                        [
                            'text' => 'Tipo de Persona',
                            'url'  => 'admin/tiposdepersonas',
                            'icon' => 'fas fa-fw fa-object-group',
                        ],
                        [
                            'text' => 'Estado de Personas',
                            'url'  => 'admin/personactivo',
                            'icon' => 'fas fa-fw fa-bed',
                        ],
                        [
                            'text' => 'Escolaridades',
                            'url'  => 'admin/escolaridades',
                        ],
                        [
                            'text' => 'Grado de Dependencia',
                            'url'  => 'admin/gradodependencia',
                            'icon' => 'fas fa-fw fa-blind',
                        ],
                        [
                            'text' => 'Estados Civiles',
                            'url'  => 'admin/estadosciviles',
                            'icon' => 'fas fa-fw fa-venus-mars',
                        ],
                        [
                            'text' => 'Motivos de Egresos',
                            'url'  => 'admin/motivoegreso',
                        ],
                        [
                            'text' => 'Áreas',
                            'url'  => 'admin/areas',
                        ],
                        [
                            'text' => 'Localización',
                            'icon' => 'fas fa-fw fa-cogs',
                            'submenu' => [
                                [
                                    'text' => 'Nacionalidades',
                                    'url'  => 'admin/nacionalidad',
                                ],
                                [
                                    'text' => 'Localidades',
                                    'url'  => 'admin/localidades',
                                ],
                                [
                                    'text' => 'Provincias',
                                    'url'  => 'admin/provincias',
                                ],
                            ],
                        ]
                    ],
                ],                
                ['text' => 'Gestión Menú',
                'url'  => 'admin/settings',
                'icon' => 'fas fa-fw fa-cogs',
                    'submenu' => [
                        [
                            'text' => 'Ingredientes',
                            'url'  => 'admin/ingredientes',
                        ],
                        [
                            'text' => 'Menúes',
                            'url'  => 'admin/menu',
                        ],        
                    ],
                ],
                ['text' => 'Generales',
                'url'  => 'admin/settings',
                'icon' => 'fas fa-fw fa-cogs',
                    'submenu' => [
                        [
                            'text' => 'Otras Cosas',
                            'url'  => 'admin/otrascosas',
                        ],
                        [
                            'text' => 'Usuario',
                            'url'  => 'user/profile',
                        ],    
                        [
                            'text' => 'Personas Campos',
                            'url'  => 'admin/personascampos',
                            'icon' => 'fas fa-fw fa-child ',
                        ],
                        [
                            'text' => 'Gestión de Interfaces',
                            'url'  => 'admin/interfaces',
                        ],
                        [
                            'text' => 'Unidades',
                            'url'  => 'admin/unidades',
                        ],
                        [
                            'text' => 'Categorías',
                            'url'  => 'admin/categorias',
                        ],    
                    ],
                ],                
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    */

    'livewire' => false,
];
