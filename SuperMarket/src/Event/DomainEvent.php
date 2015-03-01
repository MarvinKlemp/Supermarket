<?php

namespace CodingKatas\SuperMarket\Event;

abstract class DomainEvent
{
    protected $recordedAt;

    public function __construct()
    {
        $this->recordedAt = new \DateTime('NOW');
    }
}
