<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable;

use Nelmio\Alice\Generator\Resolver\UniqueValuesPool;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\UniqueValueResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class UniqueValueResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container):UniqueValueResolver
    {
        return new UniqueValueResolver($container->get(UniqueValuesPool::class));
    }
}
