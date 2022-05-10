<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\Chainable;

use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\Chainable\CollectionDenormalizerWithTemporaryFixture;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\Chainable\SimpleCollectionDenormalizer;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleCollectionDenormalizerFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleCollectionDenormalizer
    {
        return new SimpleCollectionDenormalizer(
            $container->get(CollectionDenormalizerWithTemporaryFixture::class)
        );
    }
}
