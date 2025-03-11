<?php

declare(strict_types=1);

use App\Application\Actions\Examen\ExamenListUsersAction;
use App\Application\Actions\Examen\ExamenCreateUserAction;

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->group('/listarUsuarios', function (Group $group) {
        $group->get('', ExamenListUsersAction::class);
    });

    $app->group('/crearUsuarios', function (Group $group) {
        $group->post('', ExamenCreateUserAction::class);
    });
};
