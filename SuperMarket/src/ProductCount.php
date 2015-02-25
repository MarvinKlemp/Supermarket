<?php

namespace CodingKatas\SuperMarket;

class ProductCount
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
    public function __construct(Product $product, $count = 1)
    {
        $this->product = $product;
        $this->count = $count;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * return int
     */
    public function incrementCount()
    {
        $this->count++;
    }
} 