<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Hydrator;

use Nelmio\Alice\Generator\Hydrator\Property\SymfonyPropertyAccessorHydrator;
use Nelmio\Alice\PropertyAccess\StdPropertyAccessor;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SymfonyPropertyAccessorHydratorFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SymfonyPropertyAccessorHydrator
    {
        return new SymfonyPropertyAccessorHydrator($container->get(StdPropertyAccessor::class));
    }
}
