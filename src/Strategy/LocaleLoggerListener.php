<?php

namespace Strategy;

use Psr\Log\LoggerInterface;

class LocaleLoggerListener
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onLocaleChanged(LocaleEvent $event): void
    {
        $this->logger->info(sprintf(
            'Locale was changed to %s',
            $event->getLocale()
        ));
    }
}
