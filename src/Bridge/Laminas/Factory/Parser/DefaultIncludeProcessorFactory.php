<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\Parser;

use Nelmio\Alice\FileLocator\DefaultFileLocator;
use Nelmio\Alice\Parser\IncludeProcessor\DefaultIncludeProcessor;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class DefaultIncludeProcessorFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): DefaultIncludeProcessor
    {
        return new DefaultIncludeProcessor($container->get(DefaultFileLocator::class));
    }
}
