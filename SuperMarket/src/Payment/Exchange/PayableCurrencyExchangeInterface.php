<?php

namespace CodingKatas\SuperMarket\Payment\Exchange;

use CodingKatas\SuperMarket\Payment\PayableInterface;

interface PayableCurrencyExchangeInterface
{
    /**
     * @param PayableInterface $payment
     * @param PayableInterface $payment2
     * @return PayableInterface
     * @throws UnableToExchangeCurrenciesException
     */
    public function exchangeCurrencies(PayableInterface $payment, PayableInterface $payment2);
} 