<?php

namespace CodingKatas\SuperMarket\Tests\Event;

use CodingKatas\SuperMarket\Event\DomainEvent;
use CodingKatas\SuperMarket\Event\EventHistory;

class EventHistoryTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $history = new EventHistory();

        $this->assertInstanceOf(EventHistory::class, $history);
    }

    public function test_it_should_count()
    {
        $event = $this->getMockBuilder(DomainEvent::class)->getMockForAbstractClass();
        $history = new EventHistory([$event]);

        $history->count();
    }

    public function test_it_should_record_domain_events()
    {
        $event = $this->getMockBuilder(DomainEvent::class)->getMockForAbstractClass();
        $history = new EventHistory();

        $history->recordThat($event);
        $this->assertContains($event, $history->getRecordedEvents());
    }
}
