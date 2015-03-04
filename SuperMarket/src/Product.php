<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Payment\PayableInterface;

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
     * @var PayableInterface
     */
    protected $price;

    /**
     * @param int              $id
     * @param string           $name
     * @param PayableInterface $price
     */
    public function __construct($id, $name, PayableInterface $price)
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
     * @return PayableInterface
     */
    public function price()
    {
        return $this->price;
    }
}
