<?php

namespace Tests\Strategy;

use Negotiation\LanguageNegotiator;
use PHPUnit\Framework\TestCase;
use Strategy\LocaleExtractor\AcceptLanguageHeaderLocaleExtractor;
use Strategy\LocaleExtractor\QueryStringLocaleExtractor;
use Strategy\LocaleInitializer;
use Symfony\Component\HttpFoundation\Request;

class LocaleInitializerTest extends TestCase
{
    private const LOCALES = ['fr-FR', 'de-DE', 'en-EN'];

    /**
     * @dataProvider provideLocales
     */
    public function testGuessLocaleFromQueryString(
        string $expectedLocale,
        string $requestedLocale
    ): void {

        (new LocaleInitializer(
            new QueryStringLocaleExtractor('lang'),
            self::LOCALES,
            'fr-FR'
        ))
            ->initialize(Request::create('/?lang='.$requestedLocale));

        $this->assertSame($expectedLocale, \Locale::getDefault());
    }

    /**
     * @dataProvider provideLocales
     */
    public function testGuessLocaleFromAcceptLanguageHeader(
        string $expectedLocale,
        string $requestedLocale
    ): void {

        $request = Request::create('/');
        $request->headers->set('Accept-Language', sprintf('%s;q=1.0', $requestedLocale));

        (new LocaleInitializer(
            new AcceptLanguageHeaderLocaleExtractor(new LanguageNegotiator()),
            self::LOCALES,
            'fr-FR'
        ))
            ->initialize($request);

        $this->assertSame($expectedLocale, \Locale::getDefault());
    }

    public function provideLocales(): iterable
    {
        yield ['de-DE', 'de-DE'];
        yield ['fr-FR', 'fr-FR'];
        yield ['en-EN', 'en-EN'];
        yield ['fr-FR', 'it-IT'];
        yield ['fr-FR', 'ru-RU'];
    }

    protected function setUp()
    {
        \Locale::setDefault('en-EN');
    }

    protected function tearDown()
    {
        \Locale::setDefault('en-EN');
    }
}
