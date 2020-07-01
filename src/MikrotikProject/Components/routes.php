<?php
/* Навигация в url строке */

return [
    '~^admin/search/drop/(.*)/$~' => [\MikrotikProject\Controllers\AdminController::class, 'deleteSubscriber'],
    '~^admin/search/torch/(.*)/$~' => [\MikrotikProject\Controllers\AdminController::class, 'torch'],
    '~^admin/search/$~' => [\MikrotikProject\Controllers\AdminController::class, 'search'],
    '~^admin/$~' => [\MikrotikProject\Controllers\AdminController::class, 'main'],
    '~^checkvoid/form/(.*)/create/$~' => [\MikrotikProject\Controllers\AdminController::class, 'createSubscriber'],
    '~^checkvoid/form/(.*)/$~' => [\MikrotikProject\Controllers\AdminController::class, 'createSubscriber'],
    '~^checkvoid/create/$~' => [\MikrotikProject\Controllers\AdminController::class, 'createSubscriber'],
    '~^checkvoid/$~' => [\MikrotikProject\Controllers\AdminController::class, 'checkVoidSubscriber'],



    '~^$~' => [\MikrotikProject\Controllers\MainController::class, 'main'],
];