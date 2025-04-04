<?php

namespace Miracode\StripeBundle;

use Miracode\StripeBundle\DependencyInjection\Compiler\RegisterDoctrineMappingPass;
use Stripe\Stripe;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MiracodeStripeBundle extends Bundle
{
    /**
     * @throws StripeException
     */
    public function boot(): void
    {
        $key = $this->container->getParameter('miracode_stripe.secret_key');
        if (!is_string($key)) {
            throw new StripeException('The secret key must be a string');
        }
        Stripe::setApiKey($key);
    }

    public function build(ContainerBuilder $container): void
    {
        if ($container->hasExtension('doctrine')) {
            $container->addCompilerPass(new RegisterDoctrineMappingPass());
        }
    }
}
