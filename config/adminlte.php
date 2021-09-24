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

    'title' => 'Store System FJ',
    'title_prefix' => 'Store System FJ |',
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

    'use_ico_only' => true,
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

    'logo' => '<b>StoreSystem</b>FJ',
    'logo_img' => 'img/store.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Store System FJ',

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
    'usermenu_header' => true,
    'usermenu_header_class' => '',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

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

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => true,
    'layout_dark_mode' => null,

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
    'classes_topnav' => 'navbar-dark navbar-light',
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

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-dark',
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
    'right_sidebar_icon' => 'fas fa-calculator',
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
    'password_reset_url' => '/user4',
    'password_email_url' => '/user3',
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
        // Navbar items:
        [
            'text'   => 'Busqueda...',
            'search' => true,
            'topnav' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav' => false,
        ],

       
        

        //Home
        [
            'text'        => 'Inicio',
            'url'         => '/home',
            'icon'        => 'fa fa-home',
            'label'       => 'Home',
            'label_color' => 'danger',

        ],
        //['header' => 'OPERACIONES DE NEGOCIO'],
        //Productos
        [
            'text'        => 'Productos',
            'icon'        => 'fa fa-archive',
            'label'       => 'Products',
            'label_color' => 'warning',
            'can'         => 'productos',
            'submenu' => [
                [
                //categorias
                'text'        => 'Gestionar Categorias',
                'url'         => '/category', 
                'icon_color'  => 'dark',
                ],
                
                //productos
                [
                'text'        => 'Gestionar Stock',
                'url'         => '/product',
                'icon_color'  => 'dark',
                ],
            ],
        ],
        //ventas
        [
            'text'        => 'Ventas',
            'icon'        => 'fa fa-tags',
            'label'       => 'Sales',
            'label_color' => 'info',
            'can'         => 'ventas',
            'submenu' => [

                [
                    'text'        => 'Gestionar Ventas',
                    'url'         => '/sale',
                    'icon'        => 'fa fa-tags',
                    'icon_color'  => 'dark',
                    ],


            ],

            
        ],
        //compras
        [
            'text'        => 'Compras',
            'icon'        => 'fa fa-truck',
            'label'       => "Purchases",
            'label_color' => 'success',
            'can'         => 'compras',
            'submenu' => [

                ['text'        => 'Gestionar Compras',
                'url'         => '/shopping',
                'icon'        => 'fa fa-truck',
                'icon_color'  => 'dark',
                'can'         => 'compras',],
            ],
        ],
        
        //['header' => 'CLIENTES Y SOCIOS'],
        //Clientes
        [
            'text'        => 'Clientes',
            'icon'        => 'fas fa-user-check',
            'label'       => "Clients",
            'label_color' => 'info',
            'can'         => 'clientes',
            'submenu' => [

                ['text'        => 'Gestionar Clientes',
                'url'         => '/client',
                'icon'        => 'fas fa-user-check',
                'icon_color'  => 'dark',
                'can'         => 'clientes',],
            ],
        ],
        //Proveedores
        [
            'text'        => 'Proveedores',
            'icon'        => 'fa fa-briefcase',
            'label'       => "Partners",
            'label_color' => 'primary',
            'can'         => 'proveedores',
            'submenu' => [

                ['text'        => 'Gestionar Proveedores',
                'url'         => '/provider',
                'icon'        => 'fa fa-briefcase',
                'icon_color'  => 'dark',
                'can'         => 'proveedores',],
            ],
        ],
        
        //['header' => 'REPORTES DE SERVICIOS'],
        //Informes
        [
            'text'        => 'Reportes',
            'icon'        => 'fas fa-file-contract',
            'label'       => "Report's",
            'label_color' => 'danger',
            'can'         => 'informes',
            'submenu' => [

            //Ventas
                [
                    'text'        => 'Ventas',
                    'url'         => '/ReporteVenta',
                    'icon_color'  => 'dark',
                    'can'         => 'informes',

                ],
            //compras NEW
                [
                'text'        => 'Compras',
                'url'         => '/ReporteCompra',
                'icon_color'  => 'dark',
                'can'         => 'informes',

                ],   

            

            //clientes NEW
            [
                'text'        => 'Clientes',
                'url'         => '/ReporteCliente',
                'icon_color'  => 'dark',
                'can'         => 'informes',

            ],
            
            //proveedores NEW
            [
                'text'        => 'Proveedores',
                'url'         => '/ReporteProveedor',
                'icon_color'  => 'dark',
                'can'         => 'informes',

            ],

            //Productos mas vendidos
            [
                'text'        => 'Producto mas vendido',
                'url'         => '/ReporteProductoMas',
                'icon_color'  => 'dark',
                'can'         => 'informes',
            ],

        //Productos menos vendidos
            [
                'text'        => 'Producto menos vendido',
                'url'         => '/ReporteProductoMenos',
                'icon_color'  => 'dark',
                'can'         => 'informes',
            ],
            ],
        ],

        //contabilidad
        [
            'text'         => 'Contabilidad',
            'right_sidebar' => true,
            'icon' => 'fas fa-calculator',
            'label'       => "Contability",
            'label_color' => 'success',
            'can'         => 'contabilidad',
            
            'submenu' => [
                //Resumen de cuentas
                [
                    'text'        => 'Resumen de Cuentas',
                    'url'         => '/home2',
                    'icon_color'  => 'dark', 
                ],
                //Saldo
                [
                    'text'        => 'Saldo',
                    'url'         => 'montos/montos',
                    'icon_color'  => 'dark',
                ],
                //Transferencias
                [
                    'text'        => 'Nueva Transferencia',
                    'url'         => 'transfer/create',
                    'icon_color'  => 'dark',
                ],
                //Movimientos futuros
                [
                    'text'        => 'Movimientos Futuros',
                    'url'         => 'futuro/futuro',
                    'icon_color'  => 'dark',
                ],
                //Bitacoras
                [
                    'text'        => 'Bitacoras',
                    'url'         => 'bitacora/bitacora',
                    'icon_color'  => 'dark',
                ],
                //Movimientos
                [
                    'text'        => 'Movimientos',
                    'url'         => '/roles',
                    'icon_color'  => 'dark',
                    'submenu' => [
                        //Historial de movimientos
                        [
                            'text'        => 'Historial de movimientos',
                            'url'         => 'summary/summary',
                            'icon_color'  => 'dark',
                        ],
                        //Nuevo movimiento
                        [
                            'text'        => 'Nuevo movimiento',
                            'url'         => 'summary/create',
                            'icon_color'  => 'dark',   
                        ],
                    ],

                ],
                //Categorias Facturables
                [
                    'text'        => 'Categorias Facturables',
                    'url'         => '/roles',
                    'icon_color'  => 'dark',
                    'submenu' => [
                        //Registro de categorias
                        [
                            'text'        => 'Registro de categorias',
                            'url'         => 'categories/categories',
                            'icon_color'  => 'dark', 
                        ],
                        //Nueva Categoria
                        [
                            'text'        => 'Nueva Categoria',
                            'url'         => 'categories/create',
                            'icon_color'  => 'dark', 
                        ],
                    ],
                ],
                //Balance
                [
                    'text'        => 'Balance',
                    'url'         => '/roles',
                    'icon_color'  => 'dark',
                    'submenu' => [
                        //ingresos
                        [
                            'text'        => 'Ingresos',
                            'url'         => 'balance/balance/add',  
                            'icon_color'  => 'dark',
                        ],
                        //egresos
                        [
                            'text'        => 'Egresos',
                            'url'         => 'balance/balance/out',
                            'icon_color'  => 'dark', 
                        ],
                    ],
                ],
                
                //Cuentas
                [
                    'text'        => 'Cuentas',
                    'url'         => '/roles',
                    'icon_color'  => 'dark',
                    'submenu' => [
                        
                        //Registro de cuentas
                        [
                            'text'        => 'Gestionar cuentas',
                            'url'         => 'account/account',
                            'icon_color'  => 'dark',
                        ],
                        //egresos
                        [
                            'text'        => 'Nueva Cuenta',
                            'url'         => 'account/create',
                            'icon_color'  => 'dark',        
                        ],
                    ],
                   
                ],
                
            ],
        ],
        
        
        //['header' => 'OPCIONES DE ADMINISTRADOR'],
        
        //Ajsutes del sistema
        [
            'text'        => 'Configuracion',
            'icon'        => 'fas fa-cogs',
            'can'         => 'admin',
            'label'       => "Settings",
            'label_color' => 'secondary',
            'submenu' => [
                //Variables Comerciales
                [
                    'text'        => 'Variables Comerciales',
                    'url'         => '/Bussiness',
                    'icon_color'  => 'dark',
                    'can'         => 'adminfj',
                ],

                //metricas de producto
                [
                    'text'        => 'Metricas de producto',
                    'url'         => '/metric',
                    'icon_color'  => 'dark',
                    'can'         => 'admin',
                    ],
                //Opciones de pago
                [
                    'text'        => 'Opciones de pago',
                    'url'         => '/op',
                    'icon_color'  => 'dark',
                ],
                //Personalizacion del negocio
                [
                    'text'        => 'Personalizar Negocio',
                    'url'         => '/Bussiness2',
                    'icon_color'  => 'dark',
                    'can'         => 'admin',
                ],
                //personalizar tipo de documento admitido
                [
                    'text'        => 'Documentos Aceptados',
                    'url'         => '/document',
                    'icon_color'  => 'dark',
                    'label'       => "ID",
                    'label_color' => 'primary',
                    'can'         => 'sistema',
                ],
                //licencia
                [
                    'text' => 'Licencia de producto',
                    'url'  => '/licencia',
                    'icon_color'  => 'dark',
                ],
                //cliente vigente
                [
                    'text' => 'Cliente Vigente',
                    'url'  => '/contactoFJ',
                    'icon_color'  => 'dark',
                    'can'  => 'adminfj',
                ],
                //opciones de licencia registrada
                [
                    'text' => 'Planes de Licencia',
                    'url'  => '/licenciaFJ',
                    'icon_color'  => 'dark',
                    'can'  => 'adminfj',
                ],
                //Usuarios del sistema
                [
                    'text'        => 'Usuarios del Sistema',
                    'icon_color'  => 'dark',
                    'can'         => 'usuarios',
                    'submenu' => [
                        [
                            'text'        => 'Roles de Usuario',
                            'url'         => '/roles',
                            'can'         => 'usuarios',
                            'icon_color'  => 'dark',
                        ],
                        [
                            'text'        => 'Registro de Usuarios',
                            'url'         => '/user',
                            'can'         => 'usuarios',
                            'icon_color'  => 'dark',
                        ],
                    ],
                ], 
            ],
        ],
        
        
        //['header' => 'OPCIONES DE CUENTA'],
        //opciones de cuenta
        [
            'text' => 'Perfil',
            'icon' => 'fas fa-fw fa-user',
            'can'  => 'actualizarcuenta',
            'label'       => "Profile",
            'label_color' => 'info',
            'submenu' => [
                [
                    'text' => 'Actualizar Perfil',
                    'url'  => '/user3',
                    'icon' => 'fas fa-fw fa-user',
                    'can'  => 'actualizarcuenta',
                ],
                //cambiar contrasenia
                [
                    'text' => 'Cambiar Contraseña',
                    'url'  => '/user4',
                    'icon' => 'fas fa-fw fa-lock',
                    'can'  => 'actualizarcuenta',
                ],
            ],
        ],
        
        
        
        //['header' => 'ABOUT'],
        //mas informacion
        
        [
            'text' => 'Mas Informacion',
            'icon' => 'fa fa-question-circle',
            'label'       => "About",
            'label_color' => 'warning',
            'submenu' => [
                [
                    'text' => 'Aplicativo',
                    'url'  => '/about',
                    'icon_color'  => 'dark',
                ],
                //Contactenos
                [
                    'text' => 'Contactenos',
                    'url'  => '/contacto',
                    'icon_color'  => 'dark',
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
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'JQUERY' => [
            'active' => true,
            'files' => [
                
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/jquery/latest/jquery.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://code.jquery.com/jquery-1.12.4.js',
                ],

                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//code.jquery.com/jquery-3.5.1.js',
                ],
                
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
                ],

                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
                ],
            ],
        ],
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/searchbuilder/1.2.0/js/dataTables.searchBuilder.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/searchbuilder/1.2.0/css/searchBuilder.dataTables.min.css',
                ],
                //moment
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js',
                ],

                //datatime
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/jquery.uitablefilter.js',
                ],
                //autotable pal pdf
                

                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '/js/jspdf.min.js',
                ],
                //pdf local
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.20/jspdf.plugin.autotable.min.js',
                ],
                
                
            ],
        ],

        'DateRange' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/momentjs/latest/moment.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js',
                ],

                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css',
                ],
                
            ],
        ],
        
        'Select2' => [
            'active' => true,
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
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],

                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/npm/chart.js',
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
                    'location' => '////cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js',
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



