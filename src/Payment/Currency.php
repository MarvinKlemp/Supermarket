<?php

namespace CodingKatas\SuperMarket\Payment;

class Currency
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $representation;

    /**
     * @param $aName
     * @param $aRepresentation
     */
    public function __construct($aName, $aRepresentation)
    {
        $this->name = $aName;
        $this->representation = $aRepresentation;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function representation()
    {
        return $this->representation;
    }
}
