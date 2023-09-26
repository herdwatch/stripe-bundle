<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Miracode\StripeBundle\Handler\DefaultHandlerService;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->services()

        ->set('miracode_stripe.default_handler', DefaultHandlerService::class)
        ->public()
        ->args([
            new ReferenceConfigurator('service_container'),
        ]);
};
