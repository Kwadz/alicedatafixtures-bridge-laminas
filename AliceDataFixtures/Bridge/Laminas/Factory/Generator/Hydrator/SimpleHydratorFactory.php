<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Hydrator;

use Nelmio\Alice\Generator\Hydrator\Property\SymfonyPropertyAccessorHydrator;
use Nelmio\Alice\Generator\Hydrator\SimpleHydrator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleHydratorFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleHydrator
    {
        return new SimpleHydrator($container->get(SymfonyPropertyAccessorHydrator::class));
    }
}
