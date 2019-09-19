<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/country' => [[['_route' => 'country_index', '_controller' => 'App\\Controller\\CountryController::index'], null, ['GET' => 0], null, true, false, null]],
        '/country/new' => [[['_route' => 'country_new', '_controller' => 'App\\Controller\\CountryController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/county' => [[['_route' => 'county_index', '_controller' => 'App\\Controller\\CountyController::index'], null, ['GET' => 0], null, true, false, null]],
        '/county/new' => [[['_route' => 'county_new', '_controller' => 'App\\Controller\\CountyController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/import' => [[['_route' => 'import_index', '_controller' => 'App\\Controller\\ImportController::import'], null, null, null, false, false, null]],
        '/state' => [[['_route' => 'state_index', '_controller' => 'App\\Controller\\StateController::index'], null, ['GET' => 0], null, true, false, null]],
        '/state/new' => [[['_route' => 'state_new', '_controller' => 'App\\Controller\\StateController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/statistics' => [[['_route' => 'statistics_index', '_controller' => 'App\\Controller\\StatisticsController::index'], null, ['GET' => 0], null, true, false, null]],
        '/statistics/collected_taxes_per_country' => [[['_route' => 'statistics_collected_taxes_per_country', '_controller' => 'App\\Controller\\StatisticsController::collectedTaxesPerCountry'], null, ['GET' => 0], null, false, false, null]],
        '/statistics/average_taxrate_per_country' => [[['_route' => 'statistics_average_taxrate_per_country', '_controller' => 'App\\Controller\\StatisticsController::averageTaxRatePerCountry'], null, ['GET' => 0], null, false, false, null]],
        '/statistics/average_county_taxrate_per_state' => [[['_route' => 'statistics_average_county_taxrate_per_state', '_controller' => 'App\\Controller\\StatisticsController::averageCountyTaxRatePerState'], null, ['GET' => 0], null, false, false, null]],
        '/statistics/collected_taxes_per_state' => [[['_route' => 'statistics_collected_taxes_per_state', '_controller' => 'App\\Controller\\StatisticsController::collectedTaxesPerState'], null, ['GET' => 0], null, false, false, null]],
        '/statistics/average_amount_taxes_collected_per_state' => [[['_route' => 'statistics_average_amount_taxes_collected_per_state', '_controller' => 'App\\Controller\\StatisticsController::averageAmountTaxesCollectedPerState'], null, ['GET' => 0], null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\DefaultController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/count(?'
                    .'|ry/([^/]++)(?'
                        .'|(*:192)'
                        .'|/edit(*:205)'
                        .'|(*:213)'
                    .')'
                    .'|y/([^/]++)(?'
                        .'|(*:235)'
                        .'|/edit(*:248)'
                        .'|(*:256)'
                    .')'
                .')'
                .'|/state/([^/]++)(?'
                    .'|(*:284)'
                    .'|/edit(*:297)'
                    .'|(*:305)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        192 => [[['_route' => 'country_show', '_controller' => 'App\\Controller\\CountryController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        205 => [[['_route' => 'country_edit', '_controller' => 'App\\Controller\\CountryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        213 => [[['_route' => 'country_delete', '_controller' => 'App\\Controller\\CountryController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        235 => [[['_route' => 'county_show', '_controller' => 'App\\Controller\\CountyController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        248 => [[['_route' => 'county_edit', '_controller' => 'App\\Controller\\CountyController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        256 => [[['_route' => 'county_delete', '_controller' => 'App\\Controller\\CountyController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        284 => [[['_route' => 'state_show', '_controller' => 'App\\Controller\\StateController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        297 => [[['_route' => 'state_edit', '_controller' => 'App\\Controller\\StateController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        305 => [
            [['_route' => 'state_delete', '_controller' => 'App\\Controller\\StateController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
