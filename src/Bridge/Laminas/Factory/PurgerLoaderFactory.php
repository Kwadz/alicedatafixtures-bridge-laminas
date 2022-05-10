<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory;

use Fidry\AliceDataFixtures\Bridge\Doctrine\Purger\Purger;
use Fidry\AliceDataFixtures\Loader\PersisterLoader;
use Fidry\AliceDataFixtures\Loader\PurgerLoader;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class PurgerLoaderFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): PurgerLoader
    {
        return new PurgerLoader(
            $container->get(PersisterLoader::class),
            $container->get(Purger::class),
            'delete',
        );
    }
}
