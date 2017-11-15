<?php

namespace Strategy\LocaleExtractor;

use Strategy\LocaleExtractorInterface;
use Strategy\LocaleNotFoundException;
use Symfony\Component\HttpFoundation\Request;

class QueryStringLocaleExtractor implements LocaleExtractorInterface
{
    private $parameter;

    public function __construct(string $parameter = 'lang')
    {
        $this->parameter = $parameter;
    }

    public function extractLocale(Request $request, array $supportedLocales): string
    {
        if (!$locale = $request->query->get($this->parameter)) {
            throw new LocaleNotFoundException(sprintf(
                'Cannot extract locale from a "%s" query string parameter.',
                $this->parameter
            ));
        }

        return $locale;
    }
}
