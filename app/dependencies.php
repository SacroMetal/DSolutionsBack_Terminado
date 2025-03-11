<?php

declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;

use App\Application\Actions\Examen\ExamenListUsersAction;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        ExamenListUsersAction::class => function () {
            return new ExamenListUsersAction();
        },
    ]);
};
