<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value;

use Nelmio\Alice\Generator\Resolver\Value\Chainable\ArrayValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\DynamicArrayValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\EvaluatedValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\FixtureMethodCallReferenceResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\FixturePropertyReferenceResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\FixtureWildcardReferenceResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\FunctionCallArgumentResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\ListValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\OptionalValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\ParameterValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\UniqueValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\UnresolvedFixtureReferenceIdResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\ValueForCurrentValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\VariableValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\ValueResolverRegistry;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ValueResolverRegistryFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): ValueResolverRegistry
    {
        return new ValueResolverRegistry(
            [
                $container->get(ArrayValueResolver::class),
                $container->get(DynamicArrayValueResolver::class),
                $container->get(EvaluatedValueResolver::class),
                $container->get(FunctionCallArgumentResolver::class),
                $container->get(FixturePropertyReferenceResolver::class),
                $container->get(FixtureMethodCallReferenceResolver::class),
                $container->get(UnresolvedFixtureReferenceIdResolver::class),
                $container->get(FixtureWildcardReferenceResolver::class),
                $container->get(ListValueResolver::class),
                $container->get(OptionalValueResolver::class),
                $container->get(ParameterValueResolver::class),
                $container->get(UniqueValueResolver::class),
                $container->get(ValueForCurrentValueResolver::class),
                $container->get(VariableValueResolver::class),
            ]
        );
    }
}
