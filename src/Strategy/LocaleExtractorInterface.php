<?php

namespace Strategy;

use Symfony\Component\HttpFoundation\Request;

interface LocaleExtractorInterface
{
    /**
     * @throws LocaleNotFoundException When locale is not guessable
     */
    public function extractLocale(Request $request, array $supportedLocales): string;
}
