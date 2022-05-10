<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Main;

use Nelmio\Alice\Generator\Resolver\FixtureSet\RemoveConflictingObjectsResolver;
use Nelmio\Alice\Generator\Resolver\FixtureSet\SimpleFixtureSetResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class RemoveConflictingObjectsResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): RemoveConflictingObjectsResolver
    {
        return new RemoveConflictingObjectsResolver($container->get(SimpleFixtureSetResolver::class));
    }
}
