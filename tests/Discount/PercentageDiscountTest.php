<?php

namespace MarvinKlemp\SuperMarket\Tests\Discount;

use MarvinKlemp\SuperMarket\BuyableInterface;
use MarvinKlemp\SuperMarket\Discount\PercentDiscount;

class PercentageDiscountTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $buyable = $this->getMockForAbstractClass(BuyableInterface::class);
        $percentageDiscount = new PercentDiscount($buyable, 0);

        $this->assertInstanceOf(PercentDiscount::class, $percentageDiscount);
    }

    public function test_it_should_multiply_costs()
    {
        $buyable = $this->getMockForAbstractClass(BuyableInterface::class);
        $buyable->expects($this->once())
            ->method("costs")
            ->willReturn(10);

        $shoppingBagItem = new PercentDiscount($buyable, 50);
        $this->assertEquals(5, $shoppingBagItem->costs());
    }
}
