<?php

namespace CodingKatas\SuperMarket\Payment;

interface PayableInterface
{
    /**
     * @return Currency
     */
    public function currency();

    /**
     * @return int
     */
    public function amountOfCurrency();

    /**
     * @return string
     */
    public function representation();
} 