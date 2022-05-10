<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Caller;

use Nelmio\Alice\Generator\Caller\CallProcessorRegistry;
use Nelmio\Alice\Generator\Caller\Chainable\ConfiguratorMethodCallProcessor;
use Nelmio\Alice\Generator\Caller\Chainable\MethodCallWithReferenceProcessor;
use Nelmio\Alice\Generator\Caller\Chainable\OptionalMethodCallProcessor;
use Nelmio\Alice\Generator\Caller\Chainable\SimpleMethodCallProcessor;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class CallProcessorRegistryFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): CallProcessorRegistry
    {
        return new CallProcessorRegistry(
            [
                $container->get(ConfiguratorMethodCallProcessor::class),
                $container->get(MethodCallWithReferenceProcessor::class),
                $container->get(OptionalMethodCallProcessor::class),
                $container->get(SimpleMethodCallProcessor::class),
            ]
        );
    }
}
