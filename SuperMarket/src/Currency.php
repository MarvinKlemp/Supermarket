<?php

namespace CodingKatas\SuperMarket;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRepresentation()
    {
        return $this->representation;
    }
} 