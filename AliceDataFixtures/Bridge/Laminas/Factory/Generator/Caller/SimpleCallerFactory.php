<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Caller;

use Nelmio\Alice\Generator\Caller\CallProcessorRegistry;
use Nelmio\Alice\Generator\Caller\SimpleCaller;
use Nelmio\Alice\Generator\NamedArgumentsResolver;
use Nelmio\Alice\Generator\Resolver\Value\ValueResolverRegistry;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleCallerFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleCaller
    {
        return new SimpleCaller(
            $container->get(CallProcessorRegistry::class),
            $container->get(ValueResolverRegistry::class),
            $container->get(NamedArgumentsResolver::class),
        );
    }
}
