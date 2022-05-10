<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Main;

use Nelmio\Alice\Generator\Caller\SimpleCaller;
use Nelmio\Alice\Generator\Hydrator\SimpleHydrator;
use Nelmio\Alice\Generator\Instantiator\ExistingInstanceInstantiator;
use Nelmio\Alice\Generator\ObjectGenerator\SimpleObjectGenerator;
use Nelmio\Alice\Generator\Resolver\Value\ValueResolverRegistry;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleObjectGeneratorFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleObjectGenerator
    {
        return new SimpleObjectGenerator(
            $container->get(ValueResolverRegistry::class),
            $container->get(ExistingInstanceInstantiator::class),
            $container->get(SimpleHydrator::class),
            $container->get(SimpleCaller::class),
        );
    }
}
