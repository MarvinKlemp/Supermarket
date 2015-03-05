<?php

namespace CodingKatas\SuperMarket\Event;

class EventHistory implements \Countable
{
    /**
     * @var DomainEvent[]
     */
    protected $events;

    /**
     * @param DomainEvent[] $events
     */
    public function __construct(array $events = [])
    {
        $this->events = $events;
    }

    /**
     * @param DomainEvent $anEvent
     */
    public function recordThat(DomainEvent $anEvent)
    {
        $this->events[] = $anEvent;
    }

    /**
     * @return DomainEvent[]
     */
    public function getRecordedEvents()
    {
        return $this->events;
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return count($this->events);
    }
}
