<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Instantiator;

use Nelmio\Alice\Generator\Instantiator\InstantiatorRegistry;
use Nelmio\Alice\Generator\Instantiator\InstantiatorResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class InstantiatorResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): InstantiatorResolver
    {
        return new InstantiatorResolver($container->get(InstantiatorRegistry::class));
    }
}
