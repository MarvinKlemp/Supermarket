<?php

namespace CodingKatas\SuperMarket\Events;

use CodingKatas\SuperMarket\Customer;
use CodingKatas\SuperMarket\Event\DomainEvent;

class CustomerStartedShopping extends DomainEvent
{
    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        parent::__construct();

        $this->customer = $customer;
    }

    public function customer()
    {
        return $this->customer;
    }
} 