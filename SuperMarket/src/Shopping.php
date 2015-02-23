<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Event\EventStream;

class Shopping
{
    protected function __construct(EventStream $stream = null)
    {

    }

    public static function startShopping(Customer $customer)
    {
        return new Shopping();
    }

    public static function resumeShopping(EventStream $stream)
    {
        // TODO
    }

    public function getCustomer()
    {

    }
} 