<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Main;

use Nelmio\Alice\Generator\ObjectGenerator\CompleteObjectGenerator;
use Nelmio\Alice\Generator\ObjectGenerator\SimpleObjectGenerator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class CompleteObjectGeneratorFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): CompleteObjectGenerator
    {
        return new CompleteObjectGenerator($container->get(SimpleObjectGenerator::class));
    }
}
