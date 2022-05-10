<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Parameter\Chainable;

use Nelmio\Alice\Generator\Resolver\Parameter\Chainable\RecursiveParameterResolver;
use Nelmio\Alice\Generator\Resolver\Parameter\Chainable\StringParameterResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class RecursiveParameterResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): RecursiveParameterResolver
    {
        return new RecursiveParameterResolver(
            $container->get(StringParameterResolver::class),
        );
    }
}
