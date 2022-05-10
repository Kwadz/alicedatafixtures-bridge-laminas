<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Loader;

use Nelmio\Alice\FixtureBuilder\SimpleBuilder;
use Nelmio\Alice\Generator\DoublePassGenerator;
use Nelmio\Alice\Loader\SimpleDataLoader;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleDataLoaderFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleDataLoader
    {
        return new SimpleDataLoader(
            $container->get(SimpleBuilder::class),
            $container->get(DoublePassGenerator::class),
        );
    }
}
