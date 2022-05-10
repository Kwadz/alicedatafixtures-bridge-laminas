<?php

namespace AliceDataFixtures\Bridge\Laminas\Factory\FixtureBuilder\ExpressionLanguage\Lexer;

use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\StringThenReferenceLexer;
use Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\SubPatternsLexer;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

class StringThenReferenceLexerFactory
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container): StringThenReferenceLexer
    {
        /**
         * @psalm-suppress InternalClass
         * @psalm-suppress InternalMethod
         */
        return new StringThenReferenceLexer($container->get(SubPatternsLexer::class));
    }
}
