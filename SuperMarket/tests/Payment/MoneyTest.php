<?php

namespace CodingKatas\SuperMarket\tests\Payment;

use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\Payment\Money;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $currency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();

        $money = new Money(100, $currency);

        $this->assertInstanceOf(Money::class, $money);
        $this->assertEquals(100, $money->amountOfMoney());
        $this->assertSame($currency, $money->currency());
    }
}
