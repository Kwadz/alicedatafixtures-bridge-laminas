<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Parser;

use Nelmio\Alice\FileLocator\DefaultFileLocator;
use Nelmio\Alice\Parser\IncludeProcessor\DefaultIncludeProcessor;
use Nelmio\Alice\Parser\ParserRegistry;
use Nelmio\Alice\Parser\RuntimeCacheParser;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class RuntimeCacheParserFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): RuntimeCacheParser
    {
        return new RuntimeCacheParser(
            $container->get(ParserRegistry::class),
            $container->get(DefaultFileLocator::class),
            $container->get(DefaultIncludeProcessor::class),
        );
    }
}
