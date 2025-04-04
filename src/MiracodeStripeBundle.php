<?php

namespace Miracode\StripeBundle;

use Miracode\StripeBundle\DependencyInjection\Compiler\RegisterDoctrineMappingPass;
use Stripe\Stripe;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MiracodeStripeBundle extends Bundle
{
    public function boot(): void
    {
        Stripe::setApiKey(
            $this->container->getParameter('miracode_stripe.secret_key')
        );
    }

    public function build(ContainerBuilder $container): void
    {
        if ($container->hasExtension('doctrine')) {
            $container->addCompilerPass(new RegisterDoctrineMappingPass());
        }
    }
}
