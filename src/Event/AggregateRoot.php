<?php

namespace CodingKatas\SuperMarket\Event;

abstract class AggregateRoot
{
    /**
     * @var EventHistory
     */
    protected $history;

    /**
     * @var bool
     */
    protected $isProcessed;

    /**
     * @param EventHistory $aHistory
     */
    protected function __construct(EventHistory $aHistory = null)
    {
        if ($aHistory === null) {
            $this->history = new EventHistory();
        } else {
            $this->history = $aHistory;
        }

        $this->isProcessed = false;
    }

    /**
     * @param DomainEvent $anEvent
     */
    public function recordThat(DomainEvent $anEvent)
    {
        $this->history->recordThat($anEvent);
    }

    /**
     * @param DomainEvent $anEvent
     */
    private function process(DomainEvent $anEvent)
    {
        $method = "process".(new \ReflectionClass($anEvent))->getShortName();
        $this->$method($anEvent);
    }

    /**
     * Processes the EventHistory and build the current state
     */
    public function processHistory()
    {
        foreach ($this->history->getRecordedEvents() as $anEvent) {
            $this->process($anEvent);
        }

        $this->isProcessed = true;
    }

    /**
     * @return EventHistory
     */
    public function getEventHistory()
    {
        return $this->history;
    }
}
