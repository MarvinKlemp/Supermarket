<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Payment\PayableInterface;
use CodingKatas\SuperMarket\Payment\HardCash;

class Wallet
{
    /**
     * @var PayableInterface
     */
    protected $payables;

    /**
     * @param PayableInterface $payables
     */
    public function __construct(array $payables = [])
    {
        $this->payables = $payables;
    }

    /**
     * @return HardCash
     */
    public function hardcashInWallet()
    {
        if (!isset($this->payables['hardcash'])) {
            throw new \RuntimeException(sprintf("There is no hardcash in the wallet"));
        }

        return $this->payables['hardcash'];
    }

    /**
     * @param  PayableInterface $payment
     * @return bool
     */
    public function enoughMoneyToPay(PayableInterface $payment)
    {
        return $this->totalAmount() >= $payment->amountOfCurrency();
    }

    /**
     * @return int
     */
    public function totalAmount()
    {
        $total = 0;

        /** @var PayableInterface $payable */
        foreach ($this->payables as $payable) {
            $total += $payable->amountOfCurrency();
        }

        return $total;
    }
}
