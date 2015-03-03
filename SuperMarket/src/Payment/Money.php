<?php

namespace CodingKatas\SuperMarket\Payment;

class Money
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @param int      $amount
     * @param Currency $currency
     */
    public function __construct($amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function amountOfMoney()
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function currency()
    {
        return $this->currency;
    }

    /**
     * @TODO rework this one, the amount oof money has nothing to say this actually hacks the Money VO
     *
     * @param  Money $money
     * @return bool
     */
    public function isFewerMoneyThan(Money $money)
    {
        return ($this->amount < $money->amountOfMoney());
    }

    /**
     * @TODO rework this one, the amount oof money has nothing to say this actually hacks the Money VO
     *
     * @param Money $money
     * @param int $times
     * @return Money
     */
    public function add(Money $money, $times)
    {
        return new Money($this->amount + ($money->amount * $times), $this->currency);
    }
}
