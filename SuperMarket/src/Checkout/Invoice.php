<?php

namespace CodingKatas\SuperMarket\Checkout;

use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\Payment\Money;

class Invoice
{
    /**
     * @var InvoiceItem[]
     */
    protected $items;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @param array $items
     * @param Currency $currency
     */
    public function __construct(array $items = [], Currency $currency)
    {
        $this->items = $items;
        $this->currency = $currency;
    }

    /**
     * @return Money
     */
    public function invoiceSum()
    {
        $sum = new Money(0, $this->currency);

        /** @var InvoiceItem $item */
        foreach ($this->items as $item) {
            $sum = $sum->add($item->product()->price(), $item->howOften());
        }

        return $sum;
    }
}
