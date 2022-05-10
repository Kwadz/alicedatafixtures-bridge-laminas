<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Parameter;

use Nelmio\Alice\Generator\Resolver\Parameter\Chainable\ArrayParameterResolver;
use Nelmio\Alice\Generator\Resolver\Parameter\Chainable\RecursiveParameterResolver;
use Nelmio\Alice\Generator\Resolver\Parameter\Chainable\StaticParameterResolver;
use Nelmio\Alice\Generator\Resolver\Parameter\ParameterResolverRegistry;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ParameterResolverRegistryFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): ParameterResolverRegistry
    {
        return new ParameterResolverRegistry([
            $container->get(StaticParameterResolver::class),
            $container->get(ArrayParameterResolver::class),
            $container->get(RecursiveParameterResolver::class),
        ]);
    }
}
