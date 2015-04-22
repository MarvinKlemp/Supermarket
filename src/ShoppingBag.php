<?php

namespace MarvinKlemp\SuperMarket;

use MarvinKlemp\SuperMarket\Collection\BuyableStorageInterface;

class ShoppingBag implements BuyableInterface
{
    /**
     * @var BuyableStorageInterface
     */
    protected $items;

    /**
     * @param BuyableStorageInterface $storage
     */
    public function __construct(BuyableStorageInterface $storage)
    {
        $this->items = $storage;
    }

    /**
     * @return double
     */
    public function costs()
    {
        $res = 0;

        /** @var BuyableInterface $item  */
        foreach ($this->items as $item) {
            $res += $item->costs();
        }

        return $res;
    }

    public function put(BuyableInterface $item)
    {
        $this->items->put($item);
    }
}
