<?php

namespace MarvinKlemp\SuperMarket\Collection;

use MarvinKlemp\SuperMarket\BuyableInterface;

final class BuyableCollection extends \SplObjectStorage
{
    /**
     * @param  BuyableInterface $buyable
     * @return bool
     */
    public function contains(BuyableInterface $buyable)
    {
        return $this->contains($buyable);
    }

    /**
     * @param BuyableInterface $buyable
     */
    public function put(BuyableInterface $buyable)
    {
        $this->attach($buyable);
    }

    /**
     * @param BuyableInterface $buyable
     */
    public function remove(BuyableInterface $buyable)
    {
        $this->detach($buyable);
    }
}
