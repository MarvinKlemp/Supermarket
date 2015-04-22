<?php

namespace MarvinKlemp\SuperMarket\Discount;

use MarvinKlemp\SuperMarket\BuyableInterface;

class BuyLessGetMoreDiscount implements BuyableInterface
{
    protected $item;

    protected $purchased;

    protected $received;

    public function __construct(BuyableInterface $item, $purchased, $received)
    {
        $this->item = $item;
        $this->purchased = $purchased;
        $this->received = $received;
    }

    /**
     * @return double
     */
    public function costs()
    {
        return $this->item->costs() * $this->purchased;
    }
} 