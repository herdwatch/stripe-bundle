<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Miracode\StripeBundle\Action\WebhookAction;
use Miracode\StripeBundle\Handler\StripeHandlerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->services()

        ->set('miracode_stripe.action.webhook', WebhookAction::class)
        ->public()
        ->args([
            new ReferenceConfigurator(ParameterBagInterface::class),
            new ReferenceConfigurator(StripeHandlerInterface::class),
            new ReferenceConfigurator(LoggerInterface::class),
        ]);
};
