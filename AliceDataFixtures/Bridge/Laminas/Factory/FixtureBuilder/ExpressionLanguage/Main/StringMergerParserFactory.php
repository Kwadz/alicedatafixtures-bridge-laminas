<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Main;

use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\SimpleParser;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\StringMergerParser;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class StringMergerParserFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): StringMergerParser
    {
        /**
         * @psalm-suppress InternalClass
         * @psalm-suppress InternalMethod
         */
        return new StringMergerParser($container->get(SimpleParser::class));
    }
}
