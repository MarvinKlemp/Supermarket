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
     * @param Product $aProduct
     * @param int $productCount
     */
    protected function __construct(Product $aProduct, $productCount = 1)
    {
        $this->product = $aProduct;
        $this->count = $productCount;
    }

    /**
     * @param ShoppingBagItem $anItem
     * @return InvoiceItem
     */
    public static function fromShoppingBagItem(ShoppingBagItem $anItem)
    {
        return new InvoiceItem($anItem->product(), $anItem->howOften());
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
