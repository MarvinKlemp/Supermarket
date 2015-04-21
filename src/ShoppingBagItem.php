<?php

namespace MarvinKlemp\SuperMarket;

class ShoppingBagItem implements BuyableInterface
{
    /**
     * @var BuyableInterface
     */
    protected $item;

    /**
     * @var int
     */
    protected $count;

    /**
     * @param BuyableInterface $item
     * @param int              $count
     */
    public function __construct(BuyableInterface $item, $count)
    {
        $this->item = $item;
        $this->count = $count;
    }

    /**
     * @return double
     */
    public function costs()
    {
        return $this->item->costs() * $this->count;
    }
}
