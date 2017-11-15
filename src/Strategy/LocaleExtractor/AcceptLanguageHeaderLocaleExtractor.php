<?php

namespace Strategy\LocaleExtractor;

use Negotiation\AcceptLanguage;
use Negotiation\LanguageNegotiator;
use Strategy\LocaleExtractorInterface;
use Strategy\LocaleNotFoundException;
use Symfony\Component\HttpFoundation\Request;

class AcceptLanguageHeaderLocaleExtractor implements LocaleExtractorInterface
{
    private $negotiator;

    public function __construct(LanguageNegotiator $negotiator)
    {
        $this->negotiator = $negotiator;
    }

    /**
     * {@inheritdoc}
     */
    public function extractLocale(Request $request, array $supportedLocales): string
    {
        if (!$value = $request->headers->get('Accept-Language')) {
            throw new LocaleNotFoundException('Cannot extract locale from Accept-Language request header.');
        }

        $locale = $this->negotiator->getBest($value, $supportedLocales);
        if (!$locale instanceof AcceptLanguage) {
            throw new LocaleNotFoundException('No supported locale found in Accept-Language request header.');
        }

        return $locale->getValue();
    }
}
