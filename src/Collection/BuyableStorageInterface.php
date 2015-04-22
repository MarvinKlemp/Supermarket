<?php

namespace MarvinKlemp\SuperMarket\Collection;

use MarvinKlemp\SuperMarket\BuyableInterface;

interface BuyableStorageInterface
{
    /**
     * @param BuyableInterface $buyable
     * @return bool
     */
    public function contains(BuyableInterface $buyable);

    /**
     * @param BuyableInterface $buyable
     */
    public function put(BuyableInterface $buyable);

    /**
     * @param BuyableInterface $buyable
     */
    public function remove(BuyableInterface $buyable);
} 