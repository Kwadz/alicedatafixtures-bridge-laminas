<?php

namespace AliceDataFixtures\Bridge\Laminas;

use AliceDataFixtures\Bridge\Laminas\Factory\Faker\GeneratorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\Chainable\CollectionDenormalizerWithTemporaryFixtureFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\Chainable\ReferenceRangeNameDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\Chainable\SimpleCollectionDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\FixtureDenormalizerRegistryFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SimpleFixtureBagDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationDenormalizer\SimpleSpecificationsDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsArgumentsDenormalizer\SimpleArgumentsDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsCallsDenormalizer\CallsWithFlagsDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsCallsDenormalizer\FunctionDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsConstructorsDenormalizer\ConstructorDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsConstructorsDenormalizer\FactoryDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsConstructorsDenormalizer\LegacyConstructorDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsPropertiesDenormalizer\SimplePropertyDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsValuesDenormalizer\SimpleValueDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\SpecificationsValuesDenormalizer\UniqueValueDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\Fixture\TolerantFixtureDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\FlagParser\ElementFlagParserFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Denormalizer\FlagParser\FlagParserRegistryFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Lexer\EmptyValueLexerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Lexer\FunctionLexerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Lexer\GlobalPatternsLexerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Lexer\ReferenceEscaperLexerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Lexer\StringThenReferenceLexerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Lexer\SubPatternsLexerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Main\FunctionFixtureReferenceParserFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Main\SimpleParserFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Main\StringMergerParserFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\TokenParser\Chainable\FunctionTokenParserFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\TokenParser\Chainable\IdentityTokenParserFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\TokenParser\Chainable\StringTokenParserFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\TokenParser\Chainable\TolerantFunctionTokenParserFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\TokenParser\TokenParserRegistryFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Main\SimpleBuilderFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\Main\SimpleDenormalizerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Caller\CallProcessorRegistryFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Caller\SimpleCallerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Hydrator\SimpleHydratorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Hydrator\SymfonyPropertyAccessorHydratorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Instantiator\Chainable\NoCallerMethodCallInstantiatorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Instantiator\Chainable\StaticFactoryInstantiatorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Instantiator\ExistingInstanceInstantiatorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Instantiator\InstantiatorRegistryFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Instantiator\InstantiatorResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Main\CompleteObjectGeneratorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Main\DoublePassGeneratorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Main\SimpleObjectGeneratorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Main\RemoveConflictingObjectsResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Main\SimpleFixtureSetResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Parameter\Chainable\RecursiveParameterResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Parameter\ParameterResolverRegistryFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Parameter\RemoveConflictingParametersParameterBagResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Parameter\SimpleParameterBagResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable\FakerFunctionCallValueResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable\FixturePropertyReferenceResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable\FunctionCallArgumentResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable\PhpFunctionCallValueResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable\SelfFixtureReferenceResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable\UniqueValueResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\Chainable\UnresolvedFixtureReferenceIdResolverFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Generator\Resolver\Value\ValueResolverRegistryFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Loader\SimpleDataLoaderFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Loader\SimpleFilesLoaderFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\ObjectManagerPersisterFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Parser\Chainable\YamlParserFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Parser\DefaultIncludeProcessorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Parser\ParserRegistryFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\Parser\RuntimeCacheParserFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\PersisterLoaderFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\PropertyAccess\StdPropertyAccessorFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\PurgerFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\PurgerLoaderFactory;
use AliceDataFixtures\Bridge\Laminas\Factory\SimpleLoaderFactory;
use Faker\Generator;
use Fidry\AliceDataFixtures\Bridge\Doctrine\Persister\ObjectManagerPersister;
use Fidry\AliceDataFixtures\Bridge\Doctrine\Purger\Purger;
use Fidry\AliceDataFixtures\Loader\PersisterLoader;
use Fidry\AliceDataFixtures\Loader\PurgerLoader;
use Fidry\AliceDataFixtures\Loader\SimpleLoader;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\Chainable\CollectionDenormalizerWithTemporaryFixture;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\Chainable\ReferenceRangeNameDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\Chainable\SimpleCollectionDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\Chainable\SimpleDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\FixtureDenormalizerRegistry;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SimpleFixtureBagDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Arguments\SimpleArgumentsDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Calls\CallsWithFlagsDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Calls\FunctionDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Constructor\ConstructorDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Constructor\FactoryDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Constructor\LegacyConstructorDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Property\SimplePropertyDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\SimpleSpecificationsDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Value\SimpleValueDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\SpecificationBagDenormalizer\Value\UniqueValueDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\Fixture\TolerantFixtureDenormalizer;
use Nelmio\Alice\FixtureBuilder\Denormalizer\FlagParser\ElementFlagParser;
use Nelmio\Alice\FixtureBuilder\Denormalizer\FlagParser\FlagParserRegistry;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\EmptyValueLexer;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\FunctionLexer;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\GlobalPatternsLexer;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\ReferenceEscaperLexer;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\StringThenReferenceLexer;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\SubPatternsLexer;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\FunctionFixtureReferenceParser;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\SimpleParser;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\StringMergerParser;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\TokenParser\Chainable\FunctionTokenParser;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\TokenParser\Chainable\IdentityTokenParser;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\TokenParser\Chainable\StringTokenParser;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\TokenParser\Chainable\TolerantFunctionTokenParser;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Parser\TokenParser\TokenParserRegistry;
use Nelmio\Alice\FixtureBuilder\SimpleBuilder;
use Nelmio\Alice\Generator\Caller\CallProcessorRegistry;
use Nelmio\Alice\Generator\Caller\SimpleCaller;
use Nelmio\Alice\Generator\DoublePassGenerator;
use Nelmio\Alice\Generator\Hydrator\Property\SymfonyPropertyAccessorHydrator;
use Nelmio\Alice\Generator\Hydrator\SimpleHydrator;
use Nelmio\Alice\Generator\Instantiator\Chainable\NoCallerMethodCallInstantiator;
use Nelmio\Alice\Generator\Instantiator\Chainable\StaticFactoryInstantiator;
use Nelmio\Alice\Generator\Instantiator\ExistingInstanceInstantiator;
use Nelmio\Alice\Generator\Instantiator\InstantiatorRegistry;
use Nelmio\Alice\Generator\Instantiator\InstantiatorResolver;
use Nelmio\Alice\Generator\ObjectGenerator\CompleteObjectGenerator;
use Nelmio\Alice\Generator\ObjectGenerator\SimpleObjectGenerator;
use Nelmio\Alice\Generator\Resolver\FixtureSet\RemoveConflictingObjectsResolver;
use Nelmio\Alice\Generator\Resolver\FixtureSet\SimpleFixtureSetResolver;
use Nelmio\Alice\Generator\Resolver\Parameter\Chainable\RecursiveParameterResolver;
use Nelmio\Alice\Generator\Resolver\Parameter\ParameterResolverRegistry;
use Nelmio\Alice\Generator\Resolver\Parameter\RemoveConflictingParametersParameterBagResolver;
use Nelmio\Alice\Generator\Resolver\Parameter\SimpleParameterBagResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\FakerFunctionCallValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\FixturePropertyReferenceResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\FunctionCallArgumentResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\PhpFunctionCallValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\SelfFixtureReferenceResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\UniqueValueResolver;
use Nelmio\Alice\Generator\Resolver\Value\Chainable\UnresolvedFixtureReferenceIdResolver;
use Nelmio\Alice\Generator\Resolver\Value\ValueResolverRegistry;
use Nelmio\Alice\Loader\SimpleDataLoader;
use Nelmio\Alice\Loader\SimpleFilesLoader;
use Nelmio\Alice\Parser\Chainable\YamlParser;
use Nelmio\Alice\Parser\IncludeProcessor\DefaultIncludeProcessor;
use Nelmio\Alice\Parser\ParserRegistry;
use Nelmio\Alice\Parser\RuntimeCacheParser;
use Nelmio\Alice\PropertyAccess\StdPropertyAccessor;

class ConfigProvider
{
    public static function getServiceManager(): array
    {
        return [
            'factories' => [
                PurgerLoader::class => PurgerLoaderFactory::class,
                PersisterLoader::class => PersisterLoaderFactory::class,
                SimpleLoader::class => SimpleLoaderFactory::class,
                SimpleFilesLoader::class => SimpleFilesLoaderFactory::class,
                RuntimeCacheParser::class => RuntimeCacheParserFactory::class,
                ParserRegistry::class => ParserRegistryFactory::class,
                DefaultIncludeProcessor::class => DefaultIncludeProcessorFactory::class,
                SimpleDataLoader::class => SimpleDataLoaderFactory::class,
                SimpleBuilder::class => SimpleBuilderFactory::class,
                SimpleDenormalizer::class => SimpleDenormalizerFactory::class,
                SimpleFixtureBagDenormalizer::class => SimpleFixtureBagDenormalizerFactory::class,
                TolerantFixtureDenormalizer::class => TolerantFixtureDenormalizerFactory::class,
                FixtureDenormalizerRegistry::class => FixtureDenormalizerRegistryFactory::class,
                ElementFlagParser::class => ElementFlagParserFactory::class,
                FlagParserRegistry::class => FlagParserRegistryFactory::class,
                ReferenceRangeNameDenormalizer::class => ReferenceRangeNameDenormalizerFactory::class,
                SimpleSpecificationsDenormalizer::class => SimpleSpecificationsDenormalizerFactory::class,
                LegacyConstructorDenormalizer::class => LegacyConstructorDenormalizerFactory::class,
                ConstructorDenormalizer::class => ConstructorDenormalizerFactory::class,
                SimpleArgumentsDenormalizer::class => SimpleArgumentsDenormalizerFactory::class,
                UniqueValueDenormalizer::class => UniqueValueDenormalizerFactory::class,
                SimpleValueDenormalizer::class => SimpleValueDenormalizerFactory::class,
                FunctionFixtureReferenceParser::class => FunctionFixtureReferenceParserFactory::class,
                StringMergerParser::class => StringMergerParserFactory::class,
                SimpleParser::class => SimpleParserFactory::class,
                EmptyValueLexer::class => EmptyValueLexerFactory::class,
                ReferenceEscaperLexer::class => ReferenceEscaperLexerFactory::class,
                GlobalPatternsLexer::class => GlobalPatternsLexerFactory::class,
                FunctionLexer::class => FunctionLexerFactory::class,
                StringThenReferenceLexer::class => StringThenReferenceLexerFactory::class,
                SubPatternsLexer::class => SubPatternsLexerFactory::class,
                TokenParserRegistry::class => TokenParserRegistryFactory::class,
                TolerantFunctionTokenParser::class => TolerantFunctionTokenParserFactory::class,
                IdentityTokenParser::class => IdentityTokenParserFactory::class,
                FactoryDenormalizer::class => FactoryDenormalizerFactory::class,
                CallsWithFlagsDenormalizer::class => CallsWithFlagsDenormalizerFactory::class,
                FunctionDenormalizer::class => FunctionDenormalizerFactory::class,
                SimplePropertyDenormalizer::class => SimplePropertyDenormalizerFactory::class,
                DoublePassGenerator::class => DoublePassGeneratorFactory::class,
                RemoveConflictingObjectsResolver::class => RemoveConflictingObjectsResolverFactory::class,
                SimpleFixtureSetResolver::class => SimpleFixtureSetResolverFactory::class,
                RemoveConflictingParametersParameterBagResolver::class => RemoveConflictingParametersParameterBagResolverFactory::class,
                SimpleParameterBagResolver::class => SimpleParameterBagResolverFactory::class,
                ParameterResolverRegistry::class => ParameterResolverRegistryFactory::class,
                RecursiveParameterResolver::class => RecursiveParameterResolverFactory::class,
                CompleteObjectGenerator::class => CompleteObjectGeneratorFactory::class,
                SimpleObjectGenerator::class => SimpleObjectGeneratorFactory::class,
                ValueResolverRegistry::class => ValueResolverRegistryFactory::class,
                FunctionCallArgumentResolver::class => FunctionCallArgumentResolverFactory::class,
                PhpFunctionCallValueResolver::class => PhpFunctionCallValueResolverFactory::class,
                FixturePropertyReferenceResolver::class => FixturePropertyReferenceResolverFactory::class,
                StdPropertyAccessor::class => StdPropertyAccessorFactory::class,
                UnresolvedFixtureReferenceIdResolver::class => UnresolvedFixtureReferenceIdResolverFactory::class,
                SelfFixtureReferenceResolver::class => SelfFixtureReferenceResolverFactory::class,
                ExistingInstanceInstantiator::class => ExistingInstanceInstantiatorFactory::class,
                InstantiatorResolver::class => InstantiatorResolverFactory::class,
                InstantiatorRegistry::class => InstantiatorRegistryFactory::class,
                SimpleHydrator::class => SimpleHydratorFactory::class,
                SymfonyPropertyAccessorHydrator::class => SymfonyPropertyAccessorHydratorFactory::class,
                SimpleCaller::class => SimpleCallerFactory::class,
                CallProcessorRegistry::class => CallProcessorRegistryFactory::class,
                ObjectManagerPersister::class => ObjectManagerPersisterFactory::class,
                Purger::class => PurgerFactory::class,
                Generator::class => GeneratorFactory::class,
                CollectionDenormalizerWithTemporaryFixture::class => CollectionDenormalizerWithTemporaryFixtureFactory::class,
                SimpleCollectionDenormalizer::class => SimpleCollectionDenormalizerFactory::class,
                FunctionTokenParser::class => FunctionTokenParserFactory::class,
                StringTokenParser::class => StringTokenParserFactory::class,
                NoCallerMethodCallInstantiator::class => NoCallerMethodCallInstantiatorFactory::class,
                StaticFactoryInstantiator::class => StaticFactoryInstantiatorFactory::class,
                FakerFunctionCallValueResolver::class => FakerFunctionCallValueResolverFactory::class,
                UniqueValueResolver::class => UniqueValueResolverFactory::class,
                YamlParser::class => YamlParserFactory::class,
            ],
        ];
    }
}
