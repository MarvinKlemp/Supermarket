<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Currency;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $currency = new Currency("Euro", "€");

        $this->assertEquals("Euro", $currency->getName());
        $this->assertEquals("E", $currency->getRepresentation());
    }
} 