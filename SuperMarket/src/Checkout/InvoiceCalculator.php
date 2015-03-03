<?php

namespace CodingKatas\SuperMarket\Checkout;

use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\ShoppingBag\ShoppingBag;
use CodingKatas\SuperMarket\ShoppingBag\ShoppingBagItem;

class InvoiceCalculator
{
    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @param Currency $currency
     */
    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }

    public function calculateInvoice(ShoppingBag $shoppingBag)
    {
        $invoiceItems = [];
        /** @var ShoppingBagItem $item */
        foreach ($shoppingBag->itemsInShoppingBag() as $item) {
            $invoiceItems[] = $item;
        }

        return new Invoice($invoiceItems, $this->currency);
    }
}
