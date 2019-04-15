<?php

return [

    'view' => 'partials.breadcrumbs',

    'files' => base_path('routes/breadcrumbs.php'),

    // When route-bound breadcrumbs are used but the current route doesn't have a name (UnnamedRouteException)
    'unnamed-route-exception' => true,

    // When route-bound breadcrumbs are used and the matching breadcrumb doesn't exist (InvalidBreadcrumbException)
    'missing-route-bound-breadcrumb-exception' => true,

    // When a named breadcrumb is used but doesn't exist (InvalidBreadcrumbException)
    'invalid-named-breadcrumb-exception' => true,

    // Manager
    'manager-class' => DaveJamesMiller\Breadcrumbs\BreadcrumbsManager::class,

    // Generator
    'generator-class' => DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator::class,

];
