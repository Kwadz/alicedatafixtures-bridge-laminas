<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Main;

use Nelmio\Alice\Generator\Resolver\Fixture\TemplateFixtureBagResolver;
use Nelmio\Alice\Generator\Resolver\FixtureSet\SimpleFixtureSetResolver;
use Nelmio\Alice\Generator\Resolver\Parameter\RemoveConflictingParametersParameterBagResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleFixtureSetResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleFixtureSetResolver
    {
        return new SimpleFixtureSetResolver(
            $container->get(RemoveConflictingParametersParameterBagResolver::class),
            $container->get(TemplateFixtureBagResolver::class)
        );
    }
}
