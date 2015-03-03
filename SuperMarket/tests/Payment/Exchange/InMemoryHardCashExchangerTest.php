<?php

namespace CodingKatas\SuperMarket\Tests\Payment\Exchange;

use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\Payment\Exchange\Exchange;
use CodingKatas\SuperMarket\Payment\Exchange\InMemoryHardCashExchanger;
use CodingKatas\SuperMarket\Payment\Exchange\UnableToExchangeCurrenciesException;
use CodingKatas\SuperMarket\Payment\HardCash;

class InMemoryHardCashExchangerTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $exchanger = new InMemoryHardCashExchanger([]);

        $this->assertInstanceOf(InMemoryHardCashExchanger::class, $exchanger);
    }

    public function test_it_should_throw_an_unable_to_exchange_currencies_exception()
    {
        $aCurrency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $aCurrency->expects($this->once())
            ->method('name')
            ->willReturn('dollar');
        $aPayment = $this->getMockBuilder(HardCash::class)->disableOriginalConstructor()->getMock();
        $aPayment->expects($this->once())
            ->method('currency')
            ->willReturn($aCurrency);
        $anotherCurrency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $anotherCurrency->expects($this->once())
            ->method('name')
            ->willReturn('euro');
        $anotherPayment = $this->getMockBuilder(HardCash::class)->disableOriginalConstructor()->getMock();
        $anotherPayment->expects($this->once())
            ->method('currency')
            ->willReturn($anotherCurrency);

        $exchanger = new InMemoryHardCashExchanger([]);

        $this->setExpectedException(UnableToExchangeCurrenciesException::class);
        $exchanger->exchangeCurrencies($aPayment, $anotherPayment);
    }

    public function test_it_should_return_correct_hard_cash()
    {
        $aCurrency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $aCurrency->expects($this->once())
            ->method('name')
            ->willReturn('dollar');
        $aPayment = $this->getMockBuilder(HardCash::class)->disableOriginalConstructor()->getMock();
        $aPayment->expects($this->once())
            ->method('currency')
            ->willReturn($aCurrency);
        $aPayment->expects($this->once())
            ->method('amountOfCurrency')
            ->willReturn(100);
        $anotherCurrency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $anotherCurrency->expects($this->once())
            ->method('name')
            ->willReturn('euro');
        $anotherPayment = $this->getMockBuilder(HardCash::class)->disableOriginalConstructor()->getMock();
        $anotherPayment->expects($this->exactly(2))
            ->method('currency')
            ->willReturn($anotherCurrency);

        $exchange = $this->getMockBuilder(Exchange::class)->disableOriginalConstructor()->getMock();
        $exchange->expects($this->once())
            ->method('exchangeFactor')
            ->willReturn(12);
        $exchanger = new InMemoryHardCashExchanger([
            'dollar-to-euro' => $exchange
        ]);

        $exchangedPayment = $exchanger->exchangeCurrencies($aPayment, $anotherPayment);
        $this->assertEquals(new HardCash(1200, $anotherCurrency), $exchangedPayment);
    }
} 