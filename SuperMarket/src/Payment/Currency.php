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
     * @param string $name
     * @param string $representation
     */
    public function __construct($name, $representation)
    {
        $this->name = $name;
        $this->representation = $representation;
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