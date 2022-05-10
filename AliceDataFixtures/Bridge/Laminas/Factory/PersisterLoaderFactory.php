<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory;

use Fidry\AliceDataFixtures\Bridge\Doctrine\Persister\ObjectManagerPersister;
use Fidry\AliceDataFixtures\Loader\PersisterLoader;
use Fidry\AliceDataFixtures\Loader\SimpleLoader;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class PersisterLoaderFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): PersisterLoader
    {
        return new PersisterLoader(
            $container->get(SimpleLoader::class),
            $container->get(ObjectManagerPersister::class),
        );
    }
}
