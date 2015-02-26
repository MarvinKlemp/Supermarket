<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Customer;
use CodingKatas\SuperMarket\Event\AggregateIsNotProcessedException;
use CodingKatas\SuperMarket\Event\EventHistory;
use CodingKatas\SuperMarket\Product;
use CodingKatas\SuperMarket\Shopping;

class ShoppingTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable_using_start_shopping()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $shopping = Shopping::startShopping($customer);

        $this->assertInstanceOf(Shopping::class, $shopping);
    }

    public function test_it_should_be_initializable_correct_using_resume_shopping()
    {
        $history = $this->getMockBuilder(EventHistory::class)->getMock();
        $shopping = Shopping::resumeShopping($history);

        $this->assertSame($shopping->getEventHistory(), $history);
    }


    public function test_it_should_record_the_customer_started_shopping_event()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $shopping = Shopping::startShopping($customer);

        $this->assertInstanceOf(Shopping::class, $shopping);
        $this->assertSame($customer, $shopping->getEventHistory()->getRecordedEvents()[0]->customer());
    }


    public function test_it_should_apply_correct_if_customer_started_shopping()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $shopping = Shopping::startShopping($customer);

        $shopping->process();
        $this->assertSame($customer, $shopping->getCustomer());
    }

    public function test_it_should_throw_an_aggregate_is_not_processed_exception()
    {

        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $shopping = Shopping::startShopping($customer);

        $this->setExpectedException(AggregateIsNotProcessedException::class);
        $shopping->getCustomer();

        $this->setExpectedException(AggregateIsNotProcessedException::class);
        $shopping->getShoppingBag();
    }


    public function test_it_should_apply_correct_if_product_was_put_into_shopping_bag()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $product->expects($this->exactly(2))
            ->method("identity")
            ->willReturn("id");

        $shopping = Shopping::startShopping($customer);
        $shopping->putProductIntoProductBag($product);

        $shopping->process();
        $this->assertTrue($shopping->getShoppingBag()->isProductInShoppingBag($product));
    }

    public function test_it_should_apply_correct_if_product_was_put_into_shopping_bag_twice()
    {
        $customer = $this->getMockBuilder(Customer::class)->disableOriginalConstructor()->getMock();
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $product->expects($this->exactly(5))
            ->method("identity")
            ->willReturn("id");

        $shopping = Shopping::startShopping($customer);
        $shopping->putProductIntoProductBag($product);
        $shopping->putProductIntoProductBag($product);

        $shopping->process();
        $this->assertTrue($shopping->getShoppingBag()->isProductInShoppingBag($product));
        $this->assertSame(2, $shopping->getShoppingBag()->getProductCount($product));
    }
} 