<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Event\AggregateRoot;
use CodingKatas\SuperMarket\Event\EventHistory;
use CodingKatas\SuperMarket\Events\CustomerStartedCheckoutProcess;
use CodingKatas\SuperMarket\Events\CustomerStartedShopping;
use CodingKatas\SuperMarket\Events\ProductWasPutIntoShoppingBag;
use CodingKatas\SuperMarket\Events\ProductWasRemovedFromShoppingBag;
use CodingKatas\SuperMarket\ShoppingBag\ShoppingBag;

class Shopping extends AggregateRoot
{

    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var ShoppingBag
     */
    protected $shoppingBag;

    /**
     * @param EventHistory $events
     * @param ShoppingBag  $shoppingBag
     */
    protected  function __construct(EventHistory $events = null, ShoppingBag $shoppingBag = null)
    {
        parent::__construct($events);

        $this->customer = null;
        $this->shoppingBag = null;
    }

    /**
     * @param  Customer $customer
     * @return Shopping
     */
    public static function startShopping(Customer $customer)
    {

        $shopping->recordThat(new CustomerStartedShopping($customer));
        $shopping->processHistory();

        return $shopping;
    }

    /**
     * @param  EventHistory $history
     * @return Shopping
     */
    public static function resumeShopping(EventHistory $history)
    {
        $shopping = new Shopping($history);
        $shopping->processHistory();

        return $shopping;
    }

    /**
     * @param Product $product
     */
    public function putProductIntoProductBag(Product $product)
    {
        $this->recordThat($event = new ProductWasPutIntoShoppingBag($product));
        $this->processProductWasPutIntoShoppingBag($event);
    }

    /**
     * @param Product $product
     */
    public function removeProductFromShoppingBag(Product $product)
    {
        $this->recordThat(new ProductWasRemovedFromShoppingBag($event = $product));
        $this->processProductWasRemovedFromShoppingBag($event);
    }

    /**
     *
     */
    public function checkoutShopping()
    {
       // guard this one

        $this->recordThat(new CustomerStartedCheckoutProcess());
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return ShoppingBag
     */
    public function getShoppingBag()
    {
        return $this->shoppingBag;
    }

    public function processCustomerStartedShopping(CustomerStartedShopping $event)
    {
        $this->shoppingBag = new ShoppingBag();
        $this->customer = $event->customer();
    }

    public function processProductWasPutIntoShoppingBag(ProductWasPutIntoShoppingBag $event)
    {
        $this->shoppingBag->putProductIntoShoppingBag($event->product());
    }

    public function processProductWasRemovedFromShoppingBag(ProductWasRemovedFromShoppingBag $event)
    {
        $this->shoppingBag->removeProductFromShoppingBag($event->product());
    }

    public function processCustomerStartedCheckoutProcess(CustomerStartedCheckoutProcess $event)
    {
    }
}
