<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable;

use Nelmio\Alice\Generator\Resolver\Value\Chainable\FixturePropertyReferenceResolver;
use Nelmio\Alice\PropertyAccess\StdPropertyAccessor;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class FixturePropertyReferenceResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): FixturePropertyReferenceResolver
    {
        return new FixturePropertyReferenceResolver($container->get(StdPropertyAccessor::class));
    }
}
