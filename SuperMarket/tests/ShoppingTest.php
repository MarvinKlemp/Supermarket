<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Customer;
use CodingKatas\SuperMarket\Shopping;

class ShoppingTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable_using_start_shopping()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();

        $shopping = Shopping::startShopping($customer);

        $shopping->applyEvents();
        $this->assertInstanceOf(Shopping::class, $shopping);
        $this->assertSame($customer, $shopping->getCustomer());
    }
} 