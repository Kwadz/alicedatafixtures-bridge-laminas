<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsConstructorsDenormalizer;

use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Calls\CallsWithFlagsDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Constructor\FactoryDenormalizer;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class FactoryDenormalizerFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): FactoryDenormalizer
    {
        return new FactoryDenormalizer($container->get(CallsWithFlagsDenormalizer::class));
    }
}
