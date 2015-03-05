<?php

namespace CodingKatas\SuperMarket\ShoppingBag;

use CodingKatas\SuperMarket\Product;

class ShoppingBagItem
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
     * @param int     $count
     */
    public function __construct(Product $aProduct, $count = 1)
    {
        $this->product = $aProduct;
        $this->count = $count;
    }

    /**
     * @return ShoppingBagItem
     */
    public function oneMore()
    {
        return new ShoppingBagItem($this->product, ++$this->count);
    }

    /**
     * @return ShoppingBagItem
     */
    public function oneLess()
    {
        return new ShoppingBagItem($this->product, --$this->count);
    }

    /**
     * @return int
     */
    public function howOften()
    {
        return $this->count;
    }

    /**
     * @return Product
     */
    public function product()
    {
        return $this->product;
    }
}
