<?php

namespace MarvinKlemp\SuperMarket;

class ShoppingBag implements BuyableInterface
{
    /**
     * @var BuyableInterface[]
     */
    protected $items;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @return double
     */
    public function costs()
    {
        $res = 0;

        foreach ($this->items as $item) {
            $res += $item->costs();
        }

        return $res;
    }

    public function put(BuyableInterface $item)
    {
        $this->items[] = $item;
    }
}
