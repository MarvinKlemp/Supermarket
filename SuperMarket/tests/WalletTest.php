<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Payment\HardCash;
use CodingKatas\SuperMarket\Payment\PayableInterface;
use CodingKatas\SuperMarket\Wallet;

class WalletTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $wallet = new Wallet();

        $this->assertInstanceOf(Wallet::class, $wallet);
    }

    public function test_it_should_return_hard_cash()
    {
        $hardcash = $this->getMockBuilder(HardCash::class)->disableOriginalConstructor()->getMock();
        $wallet = new Wallet([
            'hardcash' => $hardcash
        ]);

        $this->assertSame($hardcash, $wallet->hardcashInWallet());
    }

    public function test_it_should_return_total_amount_of_money()
    {
        $aPayable = $this->getMockBuilder(PayableInterface::class)->getMockForAbstractClass();
        $aPayable->expects($this->once())
            ->method('amountOfCurrency')
            ->willReturn(20);
        $anotherPayable = $this->getMockBuilder(PayableInterface::class)->getMockForAbstractClass();
        $anotherPayable->expects($this->once())
            ->method('amountOfCurrency')
            ->willReturn(3422);

        $wallet = new Wallet([
            'aPayable' => $aPayable,
            'anotherPayable' => $anotherPayable
        ]);

        $this->assertSame(3442, $wallet->totalAmount());
    }

    public function test_it_should_return_true_if_enough_payable_is_available()
    {
        $aPayable = $this->getMockBuilder(PayableInterface::class)->getMockForAbstractClass();
        $aPayable->expects($this->once())
            ->method('amountOfCurrency')
            ->willReturn(20);
        $anotherPayable = $this->getMockBuilder(PayableInterface::class)->getMockForAbstractClass();
        $anotherPayable->expects($this->once())
            ->method('amountOfCurrency')
            ->willReturn(3422);

        $payment = $this->getMockBuilder(PayableInterface::class)->getMockForAbstractClass();
        $payment->expects($this->once())
            ->method('amountOfCurrency')
            ->willReturn(200);

        $wallet = new Wallet([
            'aPayable' => $aPayable,
            'anotherPayable' => $anotherPayable
        ]);

        $this->assertTrue($wallet->enoughMoneyToPay($payment));
    }
} 