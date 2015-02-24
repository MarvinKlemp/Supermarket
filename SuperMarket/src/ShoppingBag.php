<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Event\AggregateRoot;
use CodingKatas\SuperMarket\Event\EventHistory;
use CodingKatas\SuperMarket\Events\CustomerStartedShopping;
use CodingKatas\SuperMarket\Events\ProductWasPutIntoShoppingBag;

class ShoppingBag extends AggregateRoot
{
    protected $customer;

    protected $products;

    public function __construct(EventHistory $events = null)
    {
        parent::__construct($events);

        $this->customer = null;
        $this->products = [];
    }

    public static function startShopping(Customer $customer)
    {
        $shopping = new ShoppingBag();
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

    public function addProduct(Product $product)
    {
        $this->recordThat(new ProductWasPutIntoShoppingBag($product));
    }

    public function applyProductWasPutIntoShoppingBag(ProductWasPutIntoShoppingBag $event)
    {
        $this->products[] = $event->getProduct();
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function getProducts()
    {
        return $this->products;
    }
} 