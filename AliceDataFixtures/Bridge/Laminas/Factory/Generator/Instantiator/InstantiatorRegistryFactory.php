<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Instantiator;

use Nelmio\Alice\Generator\Instantiator\Chainable\NoCallerMethodCallInstantiator;
use Nelmio\Alice\Generator\Instantiator\Chainable\NoMethodCallInstantiator;
use Nelmio\Alice\Generator\Instantiator\Chainable\NullConstructorInstantiator;
use Nelmio\Alice\Generator\Instantiator\Chainable\StaticFactoryInstantiator;
use Nelmio\Alice\Generator\Instantiator\InstantiatorRegistry;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class InstantiatorRegistryFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): InstantiatorRegistry
    {
        return new InstantiatorRegistry([
            $container->get(NoCallerMethodCallInstantiator::class),
            $container->get(NullConstructorInstantiator::class),
            $container->get(NoMethodCallInstantiator::class),
            $container->get(StaticFactoryInstantiator::class),
        ]);
    }
}
