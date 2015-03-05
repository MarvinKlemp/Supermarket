<?php

namespace CodingKatas\SuperMarket\Payment\Exchange;

use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\Payment\PayableInterface;

class InMemoryExchanger implements PayableCurrencyExchangeInterface
{
    /**
     * @var Exchange[]
     */
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
    public function exchangeCurrencies(PayableInterface $aPayable, Currency $aCurrency)
    {
        $class = get_class($aPayable);
        $index = $aPayable->currency()->name()."-to-".$aCurrency->name();

        if (!isset($this->exchanges[$index])) {
            throw new UnableToExchangeCurrenciesException();
        }

        return new $class(
            $aPayable->amountOfCurrency() * $this->exchanges[$index]->exchangeFactor(),
            $aCurrency
        );
    }
}
