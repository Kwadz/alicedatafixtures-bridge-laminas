<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\PropertyAccess;

use Nelmio\Alice\PropertyAccess\StdPropertyAccessor;
use Psr\Container\ContainerInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;

class StdPropertyAccessorFactory
{
    public function __invoke(ContainerInterface $container): StdPropertyAccessor
    {
        return new StdPropertyAccessor(PropertyAccess::createPropertyAccessor());
    }
}
