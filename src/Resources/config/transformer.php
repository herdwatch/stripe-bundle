<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Miracode\StripeBundle\Transformer\AnnotationTransformer;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->services()

        ->set('miracode_stripe.model_transformer.annotation', AnnotationTransformer::class);
};
