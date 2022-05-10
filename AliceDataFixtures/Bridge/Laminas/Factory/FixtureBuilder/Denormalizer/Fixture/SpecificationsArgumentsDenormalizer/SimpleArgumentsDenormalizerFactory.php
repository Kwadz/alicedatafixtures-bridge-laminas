<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsArgumentsDenormalizer;

use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Arguments\SimpleArgumentsDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Value\UniqueValueDenormalizer;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleArgumentsDenormalizerFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleArgumentsDenormalizer
    {
        return new SimpleArgumentsDenormalizer($container->get(UniqueValueDenormalizer::class));
    }
}
