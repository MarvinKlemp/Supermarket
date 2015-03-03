<?php

namespace CodingKatas\SuperMarket\Payment\Transformer;

use CodingKatas\SuperMarket\Payment\PayableInterface;

interface PayableCurrencyExchangeInterface
{
    /**
     * @param PayableInterface $payment
     * @param PayableInterface $payment2
     * @return PayableInterface
     * @throws UnableToExchangeCurrenciesException
     */
    public function exchangeCurrency(PayableInterface $payment, PayableInterface $payment2);
} 