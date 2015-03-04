<?php

namespace CodingKatas\SuperMarket\Tests\Checkout;

use CodingKatas\SuperMarket\Checkout\Invoice;
use CodingKatas\SuperMarket\Payment\PayableInterface;
use CodingKatas\SuperMarket\Product;
use CodingKatas\SuperMarket\ShoppingBag\ShoppingBag;
use CodingKatas\SuperMarket\ShoppingBag\ShoppingBagItem;

class InvoiceTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $aShoppingBag = $this->getMockBuilder(ShoppingBag::class)->disableOriginalConstructor()->getMock();
        $aShoppingBag->expects($this->once())
            ->method('itemsInShoppingBag')
            ->willReturn([]);

        $anInvoice = Invoice::fromShoppingBag($aShoppingBag);

        $this->assertInstanceOf(Invoice::class, $anInvoice);
    }

    public function test_it_should_return_payment_sum()
    {
        $aPrice = $this->getMockBuilder(PayableInterface::class)->getMockForAbstractClass();
        $aPrice->expects($this->any())
            ->method('amountOfCurrency')
            ->willReturn(200);
        $aProduct = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $aProduct->expects($this->any())
            ->method('price')
            ->willReturn($aPrice);
        $aShoppingBagItem = $this->getMockBuilder(ShoppingBagItem::class)->disableOriginalConstructor()->getMock();
        $aShoppingBagItem->expects($this->once())
            ->method('product')
            ->willReturn($aProduct);
        $aShoppingBagItem->expects($this->once())
            ->method('howOften')
            ->willReturn(1);

        $anotherPrice = $this->getMockBuilder(PayableInterface::class)->getMockForAbstractClass();
        $anotherPrice->expects($this->any())
            ->method('amountOfCurrency')
            ->willReturn(100);
        $anotherProduct = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $anotherProduct->expects($this->any())
            ->method('price')
            ->willReturn($anotherPrice);
        $anotherShoppingBagItem = $this->getMockBuilder(ShoppingBagItem::class)->disableOriginalConstructor()->getMock();
        $anotherShoppingBagItem->expects($this->once())
            ->method('product')
            ->willReturn($aProduct);
        $anotherShoppingBagItem->expects($this->once())
            ->method('howOften')
            ->willReturn(5);

        $aShoppingBag = $this->getMockBuilder(ShoppingBag::class)->disableOriginalConstructor()->getMock();
        $aShoppingBag->expects($this->once())
            ->method('itemsInShoppingBag')
            ->willReturn([
                "id1" => $aShoppingBagItem,
                "id2" => $anotherShoppingBagItem
            ]);

        $anInvoice = Invoice::fromShoppingBag($aShoppingBag);
        $this->assertEquals(1200, $anInvoice->totalSum());
    }
}
