<?php

namespace CodingKatas\SuperMarket\Payment\Exchange;

use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\Payment\PayableInterface;

interface PayableCurrencyExchangeInterface
{
    /**
     * @param PayableInterface $aPayable
     * @param Currency $aCurrency
     * @return PayableInterface
     * @throws UnableToExchangeCurrenciesException
     */
    public function exchangeCurrencies(PayableInterface $aPayable, Currency $aCurrency);
}
