<?php

namespace CodingKatas\SuperMarket\Payment\Exchange;

use CodingKatas\SuperMarket\Payment\HardCash;
use CodingKatas\SuperMarket\Payment\PayableInterface;

class InMemoryHardCashExchanger implements PayableCurrencyExchangeInterface
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
    public function exchangeCurrencies(PayableInterface $aPayment, PayableInterface $anotherPayment)
    {
        $index = $aPayment->currency()->name() . "-to-" . $anotherPayment->currency()->name();

        if (!isset($this->exchanges[$index])) {
            throw new UnableToExchangeCurrenciesException();
        }

        return new HardCash(
            $aPayment->amountOfCurrency() * $this->exchanges[$index]->exchangeFactor(),
            $anotherPayment->currency()
        );
    }
} 