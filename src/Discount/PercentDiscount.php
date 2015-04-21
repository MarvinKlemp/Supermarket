<?php

namespace MarvinKlemp\SuperMarket\Discount;

use MarvinKlemp\SuperMarket\BuyableInterface;

final class PercentDiscount implements BuyableInterface
{
    /**
     * @var BuyableInterface
     */
    protected $item;

    /**
     * @var double
     */
    protected $percentageDiscount;

    /**
     * @param BuyableInterface $item
     * @param double $percentageDiscount
     */
    public function __construct(BuyableInterface $item, $percentageDiscount)
    {
        $this->item = $item;
        $this->percentageDiscount = $percentageDiscount;
    }

    /**
     * @return double
     */
    public function costs()
    {
        return $this->item->costs() * $this->percentageDiscount;
    }
} 