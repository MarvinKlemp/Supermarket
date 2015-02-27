<?php

namespace CodingKatas\SuperMarket\Event;

abstract class AggregateRoot
{
    /**
     * @var EventHistory
     */
    protected $events;

    /**
     * @var bool
     */
    protected $isProcessed;

    /**
     * @param EventHistory $events
     */
    public function __construct(EventHistory $events = null)
    {
        if ($events === null) {
            $this->events = new EventHistory();
        } else {
            $this->events = $events;
        }

        $this->isProcessed = false;
    }

    /**
     * @param DomainEvent $event
     */
    public function recordThat(DomainEvent $event)
    {
        $this->events->recordThat($event);
    }

    /**
     * @param DomainEvent $event
     */
    private function process(DomainEvent $event)
    {
        $method = "process" . (new \ReflectionClass($event))->getShortName();
        $this->$method($event);
    }

    /**
     * Processes the EventHistory and build the current state
     */
    public function processHistory()
    {
        foreach ($this->events->getRecordedEvents() as $event) {
            $this->process($event);
        }

        $this->isProcessed = true;
    }

    /**
     * @return EventHistory
     */
    public function getEventHistory()
    {
        return $this->events;
    }
} 