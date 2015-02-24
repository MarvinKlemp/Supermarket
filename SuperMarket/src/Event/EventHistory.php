<?php

namespace CodingKatas\SuperMarket\Event;

class EventHistory implements \Countable, \Iterator
{
    protected $events;

    protected $pos;

    public function __construct()
    {
        $this->events = [];
        $this->pos = 0;
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

    /**
     * {@inheritDoc}
     */
    public function current()
    {
        return $this->events[$this->pos];
    }

    /**
     * {@inheritDoc}
     */
    public function next()
    {
        ++$this->pos;
    }

    /**
     * {@inheritDoc}
     */
    public function key()
    {
        return $this->pos;
    }

    /**
     * {@inheritDoc}
     */
    public function valid()
    {
        return isset($this->events[$this->pos]);
    }

    /**
     * {@inheritDoc}
     */
    public function rewind()
    {
        $this->pos = 0;
    }
} 