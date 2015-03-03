<?php

namespace CodingKatas\SuperMarket\Payment\Exchange;

class Exchange
{
    /**
     * @var int
     */
    protected $factor;

    /**
     * @param int $factor
     */
    public function __construct($factor)
    {
        $this->factor = $factor;
    }

    public function exchangeFactor()
    {
        return $this->factor;
    }
} 