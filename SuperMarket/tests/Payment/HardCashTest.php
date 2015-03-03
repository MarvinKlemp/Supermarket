<?php

namespace CodingKatas\SuperMarket\tests\Payment;

use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\Payment\HardCash;

class HardCashTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $currency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $payment = new HardCash(100, $currency);

        $this->assertInstanceOf(HardCash::class, $payment);
    }

    public function test_it_should_return_amount_of_currency()
    {
        $currency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $payment = new HardCash(100, $currency);

        $this->assertSame(100, $payment->amountOfCurrency());
    }

    public function test_it_should_return_currency()
    {
        $currency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $payment = new HardCash(100, $currency);

        $this->assertSame($currency, $payment->currency());
    }

    public function test_it_should_has_correct_representation()
    {
        $currency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $currency->expects($this->once())
            ->method('representation')
            ->willReturn("$");
        $payment = new HardCash(100, $currency);

        $this->assertSame("100 $", $payment->representation());
    }

    public function test_it_should_be_less_than()
    {
        $currency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $payment = new HardCash(100, $currency);
        $anotherPayment = new HardCash(200, $currency);

        $this->assertTrue($payment->isLessThan($anotherPayment));
    }

    public function test_it_should_be_more_than()
    {
        $currency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $payment = new HardCash(200, $currency);
        $anotherPayment = new HardCash(100, $currency);

        $this->assertTrue($payment->isMoreThan($anotherPayment));
    }
}
