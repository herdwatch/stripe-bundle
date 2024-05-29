<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Miracode\StripeBundle\Action\WebhookAction;
use Miracode\StripeBundle\Handler\DefaultHandlerService;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->services()

        ->set('miracode_stripe.action.webhook', WebhookAction::class)
        ->public()
        ->args([
            new ReferenceConfigurator('service_container'),
            new ReferenceConfigurator(DefaultHandlerService::class),
        ]);
};
