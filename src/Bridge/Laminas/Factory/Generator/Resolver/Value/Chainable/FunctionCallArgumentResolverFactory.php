<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable;

use Nelmio\Alice\Generator\Resolver\Value\Chainable\FunctionCallArgumentResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\PhpFunctionCallValueResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class FunctionCallArgumentResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): FunctionCallArgumentResolver
    {
        return new FunctionCallArgumentResolver(
            $container->get(PhpFunctionCallValueResolver::class)
        );
    }
}
