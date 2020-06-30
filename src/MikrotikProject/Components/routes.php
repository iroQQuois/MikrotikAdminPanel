<?php
/* Навигация в url строке */

return [
    '~^admin/search/drop/(.*)/$~' => [\MikrotikProject\Controllers\AdminController::class, 'delete'],
    '~^admin/search/torch/(.*)/$~' => [\MikrotikProject\Controllers\AdminController::class, 'torch'],
    '~^admin/search/$~' => [\MikrotikProject\Controllers\AdminController::class, 'search'],
    '~^admin/$~' => [\MikrotikProject\Controllers\AdminController::class, 'main'],


    '~^$~' => [\MikrotikProject\Controllers\MainController::class, 'main'],
];