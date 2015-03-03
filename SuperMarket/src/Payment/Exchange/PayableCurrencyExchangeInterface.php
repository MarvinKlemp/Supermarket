<?php

namespace CodingKatas\SuperMarket\Payment\Exchange;

use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\Payment\PayableInterface;

interface PayableCurrencyExchangeInterface
{
    /**
     * @param PayableInterface $payment
     * @param Currency $aCurrency
     * @return PayableInterface
     * @throws UnableToExchangeCurrenciesException
     */
    public function exchangeCurrencies(PayableInterface $payment, Currency $aCurrency);
} 