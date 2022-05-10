<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Parser;

use Nelmio\Alice\Parser\Chainable\JsonParser;
use Nelmio\Alice\Parser\Chainable\PhpParser;
use Nelmio\Alice\Parser\Chainable\YamlParser;
use Nelmio\Alice\Parser\ParserRegistry;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class ParserRegistryFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): ParserRegistry
    {
        return new ParserRegistry([
            $container->get(YamlParser::class),
            $container->get(PhpParser::class),
            $container->get(JsonParser::class),
        ]);
    }
}
