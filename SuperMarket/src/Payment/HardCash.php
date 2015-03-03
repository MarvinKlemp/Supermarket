<?php

namespace CodingKatas\SuperMarket\Payment;

class HardCash implements PayableInterface
{
    /**
     * @var int
     */
    protected $amountOfCurrency;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @param int      $amount
     * @param Currency $currency
     */
    public function __construct($amountOfCurrency, Currency $currency)
    {
        $this->amountOfCurrency = $amountOfCurrency;
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function amountOfCurrency()
    {
        return $this->amountOfCurrency;
    }

    /**
     * {@inheritDoc}
     */
    public function currency()
    {
        return $this->currency;
    }

    /**
     * {@inheritDoc}
     */
    public function representation()
    {
        return $this->amountOfCurrency . ' ' . $this->currency->representation();
    }

    /**
     * @param HardCash $money
     */
    public function isLessThan(HardCash $hardCash)
    {
        return ($this->amountOfCurrency < $hardCash->amountOfCurrency());
    }

    /**
     * @param HardCash $payment
     */
    public function isMoreThan(HardCash $hardCash)
    {
        return ($this->amountOfCurrency > $hardCash->amountOfCurrency());
    }
}
