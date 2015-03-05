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
     * @param Customer $aCustomer
     */
    public function __construct(Customer $aCustomer)
    {
        parent::__construct();

        $this->customer = $aCustomer;
    }

    /**
     * @return Customer
     */
    public function customer()
    {
        return $this->customer;
    }
}
