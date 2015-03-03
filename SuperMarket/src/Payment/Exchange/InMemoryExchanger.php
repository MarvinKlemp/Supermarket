<?php

namespace CodingKatas\SuperMarket\Payment\Exchange;

use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\Payment\PayableInterface;

class InMemoryExchanger implements PayableCurrencyExchangeInterface
{
    protected $exchanges;

    /**
     * @param Exchange[] $exchanges
     */
    public function __construct(array $exchanges)
    {
        $this->exchanges = $exchanges;
    }

    /**
     * {@inheritDoc}
     */
    public function exchangeCurrencies(PayableInterface $aPayment, Currency $aCurrency)
    {
        $class = get_class($aPayment);
        $index = $aPayment->currency()->name() . "-to-" . $aCurrency->name();

        if (!isset($this->exchanges[$index])) {
            throw new UnableToExchangeCurrenciesException();
        }

        return new $class(
            $aPayment->amountOfCurrency() * $this->exchanges[$index]->exchangeFactor(),
            $aCurrency
        );
    }
}