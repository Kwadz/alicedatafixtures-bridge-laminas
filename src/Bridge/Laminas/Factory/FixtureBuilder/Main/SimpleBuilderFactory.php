<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Main;

use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SimpleFixtureBagDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Parameter\SimpleParameterBagDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\SimpleDenormalizer;
use Nelmio\Alice\FixtureBuilder\SimpleBuilder;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleBuilderFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleBuilder
    {
        return new SimpleBuilder(
            new SimpleDenormalizer(
                $container->get(SimpleParameterBagDenormalizer::class),
                $container->get(SimpleFixtureBagDenormalizer::class),
            )
        );
    }
}
