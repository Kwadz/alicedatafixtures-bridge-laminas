<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Generator\Main;

use Nelmio\Alice\Generator\DoublePassGenerator;
use Nelmio\Alice\Generator\ObjectGenerator\CompleteObjectGenerator;
use Nelmio\Alice\Generator\Resolver\FixtureSet\RemoveConflictingObjectsResolver;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class DoublePassGeneratorFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): DoublePassGenerator
    {
        return new DoublePassGenerator(
            $container->get(RemoveConflictingObjectsResolver::class),
            $container->get(CompleteObjectGenerator::class),
        );
    }
}
