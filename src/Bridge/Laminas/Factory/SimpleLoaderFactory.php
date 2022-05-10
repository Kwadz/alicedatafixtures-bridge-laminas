<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory;

use Fidry\AliceDataFixtures\Loader\SimpleLoader;
use Nelmio\Alice\Loader\SimpleFilesLoader;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleLoaderFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleLoader
    {
        return new SimpleLoader($container->get(SimpleFilesLoader::class));
    }
}
