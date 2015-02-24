<?php

namespace CodingKatas\SuperMarket\Event;

abstract class AggregateRoot
{
    /**
     * @var EventHistory
     */
    protected $events;

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
    private function apply(DomainEvent $event)
    {
        $method = "apply" . (new \ReflectionClass($event))->getShortName();
        $this->$method($event);
    }

    /**
     * Builds the state using the current EventHistory
     */
    public function build()
    {
        foreach ($this->events as $event) {
            $this->apply($event);
        }
    }

    /**
     * @return EventHistory
     */
    public function getEventHistory()
    {
        return $this->events;
    }
} 