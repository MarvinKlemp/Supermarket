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
     * @param DomainEvent $event
     */
    public function recordThat(DomainEvent $event)
    {
        $this->events[] = $event;
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
