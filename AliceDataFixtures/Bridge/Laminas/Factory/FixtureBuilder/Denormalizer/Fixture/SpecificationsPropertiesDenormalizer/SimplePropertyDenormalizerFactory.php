<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsPropertiesDenormalizer;

use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Property\SimplePropertyDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Value\UniqueValueDenormalizer;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimplePropertyDenormalizerFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimplePropertyDenormalizer
    {
        return new SimplePropertyDenormalizer($container->get(UniqueValueDenormalizer::class));
    }
}
