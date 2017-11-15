<?php

namespace Strategy;

use Mediator\EventManagerInterface;
use Mediator\NullEventManager;
use Symfony\Component\HttpFoundation\Request;

class LocaleInitializer
{
    private $extractor;
    private $supportedLocales;
    private $fallbackLocale;
    private $eventManager;

    public function __construct(
        LocaleExtractorInterface $extractor,
        array $supportedLocales,
        string $fallbackLocale,
        EventManagerInterface $eventManager = null
    ) {
        $this->extractor = $extractor;
        $this->supportedLocales = $supportedLocales;
        $this->fallbackLocale = $fallbackLocale;
        $this->eventManager = $eventManager ?: new NullEventManager();
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

        $this->eventManager->fire('locale.changed', new LocaleEvent($locale));
    }
}
