<?php

namespace MarvinKlemp\SuperMarket;

class Product implements BuyableInterface
{
    /**
     * @var double
     */
    protected $costs;

    /**
     * @param double $costs
     */
    public function __construct($costs)
    {
        $this->costs = $costs;
    }

    /**
     * @return double
     */
    public function costs()
    {
        return $this->costs;
    }
}
