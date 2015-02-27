<?php

namespace CodingKatas\SuperMarket\Events;

use CodingKatas\SuperMarket\Event\DomainEvent;
use CodingKatas\SuperMarket\Product;

class ProductWasRemovedFromShoppingBag extends DomainEvent
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
    public function product()
    {
        return $this->product;
    }
} 