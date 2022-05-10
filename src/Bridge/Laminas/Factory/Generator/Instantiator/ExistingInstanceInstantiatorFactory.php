<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Instantiator;

use Nelmio\Alice\Generator\Instantiator\ExistingInstanceInstantiator;
use Nelmio\Alice\Generator\Instantiator\InstantiatorResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ExistingInstanceInstantiatorFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): ExistingInstanceInstantiator
    {
        return new ExistingInstanceInstantiator($container->get(InstantiatorResolver::class));
    }
}
