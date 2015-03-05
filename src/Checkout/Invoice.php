<?php

namespace CodingKatas\SuperMarket\Checkout;

use CodingKatas\SuperMarket\ShoppingBag\ShoppingBag;
use CodingKatas\SuperMarket\ShoppingBag\ShoppingBagItem;

class Invoice
{
    /**
     * @var InvoiceItem[]
     */
    protected $items;

    /**
     * @param $invoiceItems[] $items
     */
    protected function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @param  ShoppingBag $aShoppingBag
     * @return Invoice
     */
    public static function fromShoppingBag(ShoppingBag $aShoppingBag)
    {
        /** @var $invoiceItems[] $invoiceItems */
        $invoiceItems = [];

        /** @var ShoppingBagItem $item */
        foreach ($aShoppingBag->itemsInShoppingBag() as $anItem) {
            $invoiceItems[] = InvoiceItem::fromShoppingBagItem($anItem);
        }

        return new Invoice($invoiceItems);
    }

    /**
     * int
     */
    public function totalSum()
    {
        $totalSum = 0;

        foreach ($this->items as $item) {
            $totalSum += ($item->product()->price()->amountOfCurrency() * $item->howOften());
        }

        return $totalSum;
    }
}
