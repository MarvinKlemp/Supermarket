<?php

namespace CodingKatas\SuperMarket;

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
     * @param Product $product
     * @param int $count
     */
    public function __construct(Product $product, $count)
    {
        $this->product = $product;
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