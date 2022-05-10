<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable;

use Nelmio\Alice\Generator\Resolver\Value\Chainable\FakerFunctionCallValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\PhpFunctionCallValueResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class PhpFunctionCallValueResolverFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): PhpFunctionCallValueResolver
    {
        return new PhpFunctionCallValueResolver(
            [
                'current', // see "Note" section in https://github.com/nelmio/alice/blob/v3.10.0/doc/getting-started.md#framework-integration
            ],
            $container->get(FakerFunctionCallValueResolver::class)
        );
    }
}
