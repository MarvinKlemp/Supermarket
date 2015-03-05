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
     * @param Product $aProduct
     */
    public function __construct(Product $aProduct)
    {
        $this->product = $aProduct;
    }

    /**
     * @return Product
     */
    public function product()
    {
        return $this->product;
    }
}
