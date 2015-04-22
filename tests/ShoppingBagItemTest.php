<?php

namespace MarvinKlemp\SuperMarket\Tests;

use MarvinKlemp\SuperMarket\BuyableInterface;
use MarvinKlemp\SuperMarket\ShoppingBagItem;

class ShoppingBagItemTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $buyable = $this->getMockForAbstractClass(BuyableInterface::class);
        $shoppingBagItem = new ShoppingBagItem($buyable, 1);

        $this->assertInstanceOf(ShoppingBagItem::class, $shoppingBagItem);
    }

    public function test_it_should_multiply_costs()
    {
        $buyable = $this->getMockForAbstractClass(BuyableInterface::class);
        $buyable->expects($this->once())
                ->method("costs")
                ->willReturn(10);
        $shoppingBagItem = new ShoppingBagItem($buyable, 1);
        $this->assertEquals(10, $shoppingBagItem->costs());

        $buyable = $this->getMockForAbstractClass(BuyableInterface::class);
        $buyable->expects($this->once())
            ->method("costs")
            ->willReturn(10);
        $shoppingBagItem = new ShoppingBagItem($buyable, 5);
        $this->assertEquals(50, $shoppingBagItem->costs());
    }
}
