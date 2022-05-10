<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Instantiator\Chainable;

use Nelmio\Alice\Generator\Instantiator\Chainable\StaticFactoryInstantiator;
use Nelmio\Alice\Generator\NamedArgumentsResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class StaticFactoryInstantiatorFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): StaticFactoryInstantiator
    {
        return new StaticFactoryInstantiator($container->get(NamedArgumentsResolver::class));
    }
}
