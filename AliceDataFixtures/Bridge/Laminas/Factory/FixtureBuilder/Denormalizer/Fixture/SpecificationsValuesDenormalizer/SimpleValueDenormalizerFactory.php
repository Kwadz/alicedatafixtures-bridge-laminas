<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsValuesDenormalizer;

use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Value\SimpleValueDenormalizer;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\FunctionFixtureReferenceParser;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class SimpleValueDenormalizerFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): SimpleValueDenormalizer
    {
        return new SimpleValueDenormalizer($container->get(FunctionFixtureReferenceParser::class));
    }
}
