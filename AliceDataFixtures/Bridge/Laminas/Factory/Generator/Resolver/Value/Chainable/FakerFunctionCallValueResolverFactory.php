<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable;

use Faker\Generator;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\FakerFunctionCallValueResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class FakerFunctionCallValueResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): FakerFunctionCallValueResolver
    {
        return new FakerFunctionCallValueResolver($container->get(Generator::class));
    }
}
