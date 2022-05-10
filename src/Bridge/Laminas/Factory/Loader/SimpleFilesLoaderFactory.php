<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Loader;

use Nelmio\Alice\Loader\SimpleDataLoader;
use Nelmio\Alice\Loader\SimpleFilesLoader;
use Nelmio\Alice\Parser\RuntimeCacheParser;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleFilesLoaderFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleFilesLoader
    {
        return new SimpleFilesLoader(
            $container->get(RuntimeCacheParser::class),
            $container->get(SimpleDataLoader::class),
        );
    }
}
