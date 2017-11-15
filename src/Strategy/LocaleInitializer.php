<?php

namespace Strategy;

use Symfony\Component\HttpFoundation\Request;

class LocaleInitializer
{
    private $extractor;
    private $supportedLocales;
    private $fallbackLocale;

    public function __construct(
        LocaleExtractorInterface $extractor,
        array $supportedLocales,
        string $fallbackLocale
    ) {
        $this->extractor = $extractor;
        $this->supportedLocales = $supportedLocales;
        $this->fallbackLocale = $fallbackLocale;
    }

    public function initialize(Request $request): void
    {
        $locale = $this->fallbackLocale;

        try {
            $locale = $this->extractor->extractLocale($request, $this->supportedLocales);
        } catch (LocaleNotFoundException $e) {
        }

        if (!in_array($locale, $this->supportedLocales, true)) {
            $locale = $this->fallbackLocale;
        }

        \Locale::setDefault($locale);
    }
}
