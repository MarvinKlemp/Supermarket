<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Currency;
use CodingKatas\SuperMarket\Money;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $currency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();

        $money = new Money(100, $currency);

        $this->assertInstanceOf(Money::class, $money);
        $this->assertEquals(100, $money->getAmount());
        $this->assertSame($currency, $money->getCurrency());
    }
} 