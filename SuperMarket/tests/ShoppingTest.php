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

        $this->assertInstanceOf(Shopping::class, $shopping);
    }

    public function test_it_should_record_the_customer_started_shopping_event()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $shopping = Shopping::startShopping($customer);

        $this->assertInstanceOf(Shopping::class, $shopping);
        $this->assertSame($customer, $shopping->getEventHistory()->getRecordedEvents()[0]->getCustomer());
    }

    public function test_it_should_apply_correct_if_customer_started_shopping()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $shopping = Shopping::startShopping($customer);

        $shopping->build();
        $this->assertSame($customer, $shopping->getCustomer());
    }
} 