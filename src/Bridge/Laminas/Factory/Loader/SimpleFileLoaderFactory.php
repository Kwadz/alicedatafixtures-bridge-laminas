<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Loader;

use Nelmio\Alice\Loader\SimpleDataLoader;
use Nelmio\Alice\Loader\SimpleFileLoader;
use Nelmio\Alice\Parser\RuntimeCacheParser;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleFileLoaderFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleFileLoader
    {
        return new SimpleFileLoader(
            $container->get(RuntimeCacheParser::class),
            $container->get(SimpleDataLoader::class),
        );
    }
}
