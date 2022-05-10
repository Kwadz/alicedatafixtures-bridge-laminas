<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Faker;

use Faker\Factory;
use Faker\Generator;
use Psr\Container\ContainerInterface;

class GeneratorFactory
{
    public function __invoke(ContainerInterface $container): Generator
    {
        $generator = Factory::create();
        $generator->seed(1);

        return $generator;
    }
}
