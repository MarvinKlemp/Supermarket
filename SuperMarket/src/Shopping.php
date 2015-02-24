<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Event\AggregateRoot;
use CodingKatas\SuperMarket\Event\EventHistory;
use CodingKatas\SuperMarket\Events\CustomerStartedShopping;

class Shopping extends AggregateRoot
{
    protected $customer;

    public static function startShopping(Customer $customer)
    {
        $shopping = new Shopping();
        $shopping->recordThat(new CustomerStartedShopping($customer));

        return $shopping;
    }

    public static function resumeShopping(EventHistory $stream)
    {
        // TODO
    }

    public function applyCustomerStartedShopping(CustomerStartedShopping $event)
    {
        $this->customer = $event->getCustomer();
    }

    public function getCustomer()
    {
        return $this->customer;
    }
} 