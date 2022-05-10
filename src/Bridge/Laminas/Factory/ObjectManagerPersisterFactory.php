<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory;

use Doctrine\ORM\EntityManager;
use Fidry\AliceDataFixtures\Bridge\Doctrine\Persister\ObjectManagerPersister;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ObjectManagerPersisterFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): ObjectManagerPersister
    {
        return new ObjectManagerPersister($container->get(EntityManager::class));
    }
}
