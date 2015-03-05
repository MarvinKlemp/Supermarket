<?php

namespace CodingKatas\SuperMarket\Payment\Exchange;

class Exchange
{
    /**
     * @var int
     */
    protected $factor;

    /**
     * @param int $aExchangeFactor
     */
    public function __construct($aExchangeFactor)
    {
        $this->factor = $aExchangeFactor;
    }

    public function exchangeFactor()
    {
        return $this->factor;
    }
}
