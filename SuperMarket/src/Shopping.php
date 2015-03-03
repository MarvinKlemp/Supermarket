<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Event\AggregateIsNotProcessedException;
use CodingKatas\SuperMarket\Event\AggregateRoot;
use CodingKatas\SuperMarket\Event\EventHistory;
use CodingKatas\SuperMarket\Events\CustomerStartedCheckoutProcess;
use CodingKatas\SuperMarket\Events\CustomerStartedShopping;
use CodingKatas\SuperMarket\Events\ProductWasPutIntoShoppingBag;
use CodingKatas\SuperMarket\Events\ProductWasRemovedFromShoppingBag;
use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\ShoppingBag\ShoppingBag;
use CodingKatas\SuperMarket\Checkout\InvoiceCalculator;

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
    public function __construct(EventHistory $events = null, ShoppingBag $shoppingBag = null)
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
        $shopping = new Shopping();
        $shopping->recordThat(new CustomerStartedShopping($customer));

        return $shopping;
    }

    /**
     * @param  EventHistory $history
     * @return Shopping
     */
    public static function resumeShopping(EventHistory $history)
    {
        return new Shopping($history);
    }

    /**
     * @param Product $product
     */
    public function putProductIntoProductBag(Product $product)
    {
        $this->recordThat(new ProductWasPutIntoShoppingBag($product));
    }

    /**
     * @param Product $product
     */
    public function removeProductFromShoppingBag(Product $product)
    {
        $this->recordThat(new ProductWasRemovedFromShoppingBag($product));
    }

    /**
     *
     */
    public function checkoutShopping()
    {
        $this->recordThat(new CustomerStartedCheckoutProcess());
    }

    /**
     * @return Customer
     * @throws AggregateIsNotProcessedException
     */
    public function getCustomer()
    {
        if (!$this->isProcessed) {
            throw new AggregateIsNotProcessedException();
        }

        return $this->customer;
    }

    /**
     * @return ShoppingBag
     * @throws AggregateIsNotProcessedException
     */
    public function getShoppingBag()
    {
        if (!$this->isProcessed) {
            throw new AggregateIsNotProcessedException();
        }

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
        $invoice = (new InvoiceCalculator(new Currency('dollar', '$')))->calculateInvoice($this->shoppingBag);

        if (!$this->customer->wallet()->hasEnoughMoneyToPay($invoice->invoiceSum())) {
            echo "hah"; print_r($invoice->invoiceSum());
            // $this->recordThat(); invoice cant paid
        } else {
            echo "lol"; print_r($invoice->invoiceSum());
            // $this->recordThat() invoice was paid
        }
    }
}
