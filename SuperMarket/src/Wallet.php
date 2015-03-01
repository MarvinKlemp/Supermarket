<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Payment\Money;

class Wallet
{
    /**
     * @var Money
     */
    protected $money;

    /**
     * @param Money $money
     */
    public function __construct(Money $money)
    {
        $this->money = $money;
    }

    /**
     * return
     */
    public function howMuchMoneyIsInWallet()
    {
        return $this->money;
    }

    /**
     * @param Money $money
     * @return bool
     */
    public function hasEnoughMoneyToPay(Money $money)
    {
        return $this->money->isFewerMoneyThan($money);
    }
} 