<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\AuthController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\AuthController::logout'], null, null, null, false, false, null]],
        '/facturador/dashboard' => [[['_route' => 'app_facturador_dashboard', '_controller' => 'App\\Controller\\FacturaController::dashboardFacturador'], null, null, null, false, false, null]],
        '/gerente/dashboard' => [[['_route' => 'app_gerente_dashboard', '_controller' => 'App\\Controller\\FacturaController::dashboardGerente'], null, null, null, false, false, null]],
        '/registrar' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/cliente/dashboard' => [[['_route' => 'app_cliente_dashboard', '_controller' => 'App\\Controller\\TicketController::dashboardCliente'], null, null, null, false, false, null]],
        '/cliente/crear/ticket' => [[['_route' => 'app_ticket_crear', '_controller' => 'App\\Controller\\TicketController::crearTicket'], null, null, null, false, false, null]],
        '/tecnico/dashboard' => [[['_route' => 'app_tecnico_dashboard', '_controller' => 'App\\Controller\\TicketController::dashboardTecnico'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/facturador/generar/factura/([^/]++)(*:78)'
                .'|/tecnico/atender/ticket/([^/]++)(*:117)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        78 => [[['_route' => 'app_factura_crear', '_controller' => 'App\\Controller\\FacturaController::crearFactura'], ['id'], null, null, false, true, null]],
        117 => [
            [['_route' => 'app_ticket_atender', '_controller' => 'App\\Controller\\TicketController::atenderTicket'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
