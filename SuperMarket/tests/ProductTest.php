<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Payment\Money;
use CodingKatas\SuperMarket\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $money = $this->getMockBuilder(Money::class)->disableOriginalConstructor()->getMock();

        $product = new Product(1, "ball", $money);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals(1, $product->identity());
        $this->assertEquals("ball", $product->name());
        $this->assertSame($money, $product->price());
    }
} 