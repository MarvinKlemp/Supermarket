<?php

namespace CodingKatas\SuperMarket\Tests\Payment\Exchange;

use CodingKatas\SuperMarket\Payment\Exchange\Exchange;

class ExchangeTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $exchange = new Exchange(100);

        $this->assertInstanceOf(Exchange::class, $exchange);
    }

    public function test_it_should_return_correct_factor()
    {
        $exchange = new Exchange(100);

        $this->assertSame(100, $exchange->exchangeFactor());
    }
} 