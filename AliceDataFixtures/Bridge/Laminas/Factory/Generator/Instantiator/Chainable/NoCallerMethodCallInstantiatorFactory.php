<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Instantiator\Chainable;

use Nelmio\Alice\Generator\Instantiator\Chainable\NoCallerMethodCallInstantiator;
use Nelmio\Alice\Generator\NamedArgumentsResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class NoCallerMethodCallInstantiatorFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): NoCallerMethodCallInstantiator
    {
        return new NoCallerMethodCallInstantiator($container->get(NamedArgumentsResolver::class));
    }
}
