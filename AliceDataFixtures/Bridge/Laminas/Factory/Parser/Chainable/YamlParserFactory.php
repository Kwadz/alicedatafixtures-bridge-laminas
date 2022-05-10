<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Parser\Chainable;

use Nelmio\Alice\Parser\Chainable\YamlParser;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\Yaml\Parser;

class YamlParserFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): YamlParser
    {
        return new YamlParser($container->get(Parser::class));
    }
}
