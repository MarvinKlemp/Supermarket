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
     * @param $amountOfCurrency
     * @param Currency $aCurrency
     */
    public function __construct($amountOfCurrency, Currency $aCurrency)
    {
        $this->amountOfCurrency = $amountOfCurrency;
        $this->currency = $aCurrency;
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
        return $this->amountOfCurrency.' '.$this->currency->representation();
    }

    /**
     * @return string
     */
    public function name()
    {
        return 'hardcash';
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
