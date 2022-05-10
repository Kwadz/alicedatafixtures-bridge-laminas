<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Parameter;

use Nelmio\Alice\Generator\Resolver\Parameter\RemoveConflictingParametersParameterBagResolver;
use Nelmio\Alice\Generator\Resolver\Parameter\SimpleParameterBagResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class RemoveConflictingParametersParameterBagResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): RemoveConflictingParametersParameterBagResolver
    {
        return new RemoveConflictingParametersParameterBagResolver($container->get(SimpleParameterBagResolver::class));
    }
}
