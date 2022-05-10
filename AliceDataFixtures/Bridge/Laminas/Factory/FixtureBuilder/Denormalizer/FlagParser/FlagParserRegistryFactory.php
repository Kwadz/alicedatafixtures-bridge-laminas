<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\FlagParser;

use Nelmio\Alice\FixtureBuilder\Denormalizer\FlagParser\Chainable\ConfiguratorFlagParser;
use Nelmio\Alice\FixtureBuilder\Denormalizer\FlagParser\Chainable\ExtendFlagParser;
use Nelmio\Alice\FixtureBuilder\Denormalizer\FlagParser\Chainable\OptionalFlagParser;
use Nelmio\Alice\FixtureBuilder\Denormalizer\FlagParser\Chainable\TemplateFlagParser;
use Nelmio\Alice\FixtureBuilder\Denormalizer\FlagParser\Chainable\UniqueFlagParser;
use Nelmio\Alice\FixtureBuilder\Denormalizer\FlagParser\FlagParserRegistry;
use Psr\Container\ContainerInterface;

class FlagParserRegistryFactory
{
    public function __invoke(ContainerInterface $container): FlagParserRegistry
    {
        return new FlagParserRegistry(
            [
                new ConfiguratorFlagParser(),
                new ExtendFlagParser(),
                new OptionalFlagParser(),
                new TemplateFlagParser(),
                new UniqueFlagParser(),
            ]
        );
    }
}
