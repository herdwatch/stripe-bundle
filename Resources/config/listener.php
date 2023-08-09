<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Miracode\StripeBundle\EventListener\StripeEventSubscriber;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->services()

        ->set('miracode_stripe.subscriber.stripe_event', StripeEventSubscriber::class)
        ->tag('kernel.event_subscriber')
        ->args([
            new ReferenceConfigurator('miracode_stripe.model_manager')
        ]);
};
