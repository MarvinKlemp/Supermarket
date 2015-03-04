<?php

namespace CodingKatas\SuperMarket\Checkout;

use CodingKatas\SuperMarket\ShoppingBag\ShoppingBagItem;
use CodingKatas\SuperMarket\Product;

class InvoiceItem
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @var int
     */
    protected $count;

    /**
     * @param Product $product
     * @param int     $count
     */
    protected function __construct(Product $product, $count)
    {
        $this->product = $product;
        $this->count = $count;
    }

    /**
     * @param  ShoppingBagItem $item
     * @return InvoiceItem
     */
    public static function fromShoppingBagItem(ShoppingBagItem $item)
    {
        return new InvoiceItem($item->product(), $item->howOften());
    }

    /**
     * @return Product
     */
    public function product()
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function howOften()
    {
        return $this->count;
    }
}
