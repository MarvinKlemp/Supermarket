<?php

namespace CodingKatas\SuperMarket\Tests\Payment\Exchange;

use CodingKatas\SuperMarket\Payment\Currency;
use CodingKatas\SuperMarket\Payment\Exchange\Exchange;
use CodingKatas\SuperMarket\Payment\Exchange\InMemoryExchanger;
use CodingKatas\SuperMarket\Payment\Exchange\UnableToExchangeCurrenciesException;
use CodingKatas\SuperMarket\Payment\HardCash;
use CodingKatas\SuperMarket\Payment\PayableInterface;

class InMemoryExchangerTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $exchanger = new InMemoryExchanger([]);

        $this->assertInstanceOf(InMemoryExchanger::class, $exchanger);
    }

    public function test_it_should_throw_an_unable_to_exchange_currencies_exception()
    {
        $aCurrency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $aCurrency->expects($this->once())
            ->method('name')
            ->willReturn('dollar');
        $aPayment = $this->getMockBuilder(PayableInterface::class)->disableOriginalConstructor()->getMock();
        $aPayment->expects($this->once())
            ->method('currency')
            ->willReturn($aCurrency);
        $anotherCurrency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $anotherCurrency->expects($this->once())
            ->method('name')
            ->willReturn('euro');

        $exchanger = new InMemoryExchanger([]);

        $this->setExpectedException(UnableToExchangeCurrenciesException::class);
        $exchanger->exchangeCurrencies($aPayment, $anotherCurrency);
    }

    /**
     * Cant test this with mocks
     * Should find a way to test this properly
     */
    public function test_it_should_return_correct_payable()
    {
        $aPayment = new HardCash(100, new Currency('dollar', '$'));

        $anotherCurrency = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $anotherCurrency->expects($this->once())
            ->method('name')
            ->willReturn('euro');
        $exchange = $this->getMockBuilder(Exchange::class)->disableOriginalConstructor()->getMock();
        $exchange->expects($this->once())
            ->method('exchangeFactor')
            ->willReturn(12);
        $exchanger = new InMemoryExchanger([
            'dollar-to-euro' => $exchange
        ]);

        $exchangedPayment = $exchanger->exchangeCurrencies($aPayment, $anotherCurrency);

        $this->assertEquals(1200, $exchangedPayment->amountOfCurrency());
        $this->assertSame($anotherCurrency, $exchangedPayment->currency());
    }
} 