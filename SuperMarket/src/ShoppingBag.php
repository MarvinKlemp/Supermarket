<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Event\AggregateIsNotProcessedException;
use CodingKatas\SuperMarket\Event\AggregateRoot;
use CodingKatas\SuperMarket\Event\EventHistory;
use CodingKatas\SuperMarket\Events\CustomerStartedShopping;
use CodingKatas\SuperMarket\Events\ProductWasPutIntoShoppingBag;

class ShoppingBag extends AggregateRoot
{
    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var ProductCount[]
     */
    protected $products;

    /**
     * @param EventHistory $events
     */
    public function __construct(EventHistory $events = null)
    {
        parent::__construct($events);

        $this->customer = null;
        $this->products = [];
    }

    /**
     * @param Customer $customer
     * @return ShoppingBag
     */
    public static function startShopping(Customer $customer)
    {
        $shopping = new ShoppingBag();
        $shopping->recordThat(new CustomerStartedShopping($customer));

        return $shopping;
    }

    /**
     * @param EventHistory $history
     * @return ShoppingBag
     */
    public static function resumeShopping(EventHistory $history)
    {
        return new ShoppingBag($history);
    }

    public function applyCustomerStartedShopping(CustomerStartedShopping $event)
    {
        $this->customer = $event->getCustomer();
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $this->recordThat(new ProductWasPutIntoShoppingBag($product));
    }

    public function applyProductWasPutIntoShoppingBag(ProductWasPutIntoShoppingBag $event)
    {
        $product = $event->getProduct();
        $id = $product->identity();

        if (!isset($this->products[$id])) {
            $this->products[$id] = new ProductCount($product);
        } else {
            $this->products[$id]->incrementCount();
        }
    }

    /**
     * @return Customer
     * @throws AggregateIsNotProcessedException
     */
    public function getCustomer()
    {
        if(!$this->isProcessed) {
            throw new AggregateIsNotProcessedException();
        }

        return $this->customer;
    }

    /**
     * @return ProductCount[]
     * @throws AggregateIsNotProcessedException
     */
    public function getProducts()
    {
        if(!$this->isProcessed) {
            throw new AggregateIsNotProcessedException();
        }

        return $this->products;
    }
} 