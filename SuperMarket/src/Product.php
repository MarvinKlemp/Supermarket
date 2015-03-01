<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Payment\Money;

class Product
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Money
     */
    protected $price;

    /**
     * @param int    $id
     * @param string $name
     * @param Money  $price
     */
    public function __construct($id, $name, Money $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function identity()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return Money
     */
    public function price()
    {
        return $this->price;
    }
}
