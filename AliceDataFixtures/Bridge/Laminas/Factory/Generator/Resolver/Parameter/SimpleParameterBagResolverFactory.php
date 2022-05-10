<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Parameter;

use Nelmio\Alice\Generator\Resolver\Parameter\ParameterResolverRegistry;
use Nelmio\Alice\Generator\Resolver\Parameter\SimpleParameterBagResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleParameterBagResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleParameterBagResolver
    {
        return new SimpleParameterBagResolver($container->get(ParameterResolverRegistry::class));
    }
}
