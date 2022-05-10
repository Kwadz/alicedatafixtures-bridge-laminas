<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture;

use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SimpleFixtureBagDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\TolerantFixtureDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\FlagParser\ElementFlagParser;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleFixtureBagDenormalizerFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleFixtureBagDenormalizer
    {
        return new SimpleFixtureBagDenormalizer(
            $container->get(TolerantFixtureDenormalizer::class),
            $container->get(ElementFlagParser::class),
        );
    }
}
