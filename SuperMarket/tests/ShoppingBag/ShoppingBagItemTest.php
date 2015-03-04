<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Product;
use CodingKatas\SuperMarket\ShoppingBag\ShoppingBagItem;

class ShoppingBagItemTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $item = new ShoppingBagItem($product);

        $this->assertInstanceOf(ShoppingBagItem::class, $item);
    }

    public function test_it_should_be_immutable()
    {
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $item = new ShoppingBagItem($product);
        $clone = clone $item;
        $this->assertEquals($item, $clone);

        $item->howOften();
        $item->oneLess();
        $item->oneMore();
        $item->product();

        $this->assertEquals($item, $clone);
    }

    public function test_it_should_increase_product_count()
    {
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();

        $item = new ShoppingBagItem($product);
        $this->assertSame(1, $item->howOften());

        $item = $item->oneMore();
        $this->assertSame(2, $item->howOften());
    }

    public function test_it_should_decrease_product_count()
    {
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();

        $item = new ShoppingBagItem($product);
        $this->assertSame(1, $item->howOften());

        $item = $item->oneLess();
        $this->assertSame(0, $item->howOften());
    }
} 