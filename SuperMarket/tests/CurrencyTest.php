<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Currency;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $currency = new Currency("Euro", "€");

        $this->assertInstanceOf(Currency::class, $currency);
        $this->assertEquals("Euro", $currency->name());
        $this->assertEquals("€", $currency->representation());
    }
} 