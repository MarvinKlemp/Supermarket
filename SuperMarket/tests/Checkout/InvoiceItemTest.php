<?php

namespace CodingKatas\SuperMarket\Tests\Checkout;

use CodingKatas\SuperMarket\Checkout\InvoiceItem;
use CodingKatas\SuperMarket\Product;
use CodingKatas\SuperMarket\ShoppingBag\ShoppingBagItem;

class InvoiceItemTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $aProduct = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $aShoppingBagItem = $this->getMockBuilder(ShoppingBagItem::class)->disableOriginalConstructor()->getMock();
        $aShoppingBagItem->expects($this->once())
            ->method('product')
            ->willReturn($aProduct);
        $aShoppingBagItem->expects($this->once())
            ->method('howOften')
            ->willReturn(1);
        $item = InvoiceItem::fromShoppingBagItem($aShoppingBagItem);

        $this->assertInstanceOf(InvoiceItem::class, $item);
    }

    public function test_it_should_be_immutable()
    {
        $aProduct = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $aShoppingBagItem = $this->getMockBuilder(ShoppingBagItem::class)->disableOriginalConstructor()->getMock();
        $aShoppingBagItem->expects($this->once())
            ->method('product')
            ->willReturn($aProduct);
        $aShoppingBagItem->expects($this->once())
            ->method('howOften')
            ->willReturn(1);
        $item = InvoiceItem::fromShoppingBagItem($aShoppingBagItem);

        $clone = clone $item;
        $this->assertEquals($item, $clone);

        $item->howOften();
        $item->product();

        $this->assertEquals($item, $clone);
    }
}
