<?php

namespace CodingKatas\SuperMarket\Events;

use CodingKatas\SuperMarket\Event\DomainEvent;
use CodingKatas\SuperMarket\Product;

class ProductWasPutIntoShoppingBag extends DomainEvent
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }
} 