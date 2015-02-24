<?php

namespace CodingKatas\SuperMarket\Tests\Event;

use CodingKatas\SuperMarket\Event\DomainEvent;
use CodingKatas\SuperMarket\Event\EventHistory;

class TestEventStream extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $history = new EventHistory();

        $this->assertInstanceOf(EventHistory::class, $history);
    }

    public function test_it_should_count()
    {
        $event = $this->getMockBuilder(DomainEvent::class)->getMockForAbstractClass();
        $history = new EventHistory();

        $history->recordThat($event);
        $history->count();
    }

    public function test_it_should_add_events()
    {
        $history = new EventHistory();
    }
} 