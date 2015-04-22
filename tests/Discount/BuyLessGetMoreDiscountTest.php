<?php

namespace MarvinKlemp\SuperMarket\Tests;

use MarvinKlemp\SuperMarket\BuyableInterface;
use MarvinKlemp\SuperMarket\Discount\BuyLessGetMoreDiscount;

class BuyLessGetMoreDiscountTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $buyable = $this->getMockForAbstractClass(BuyableInterface::class);
        $percentageDiscount = new BuyLessGetMoreDiscount($buyable, 2, 3);

        $this->assertInstanceOf(BuyLessGetMoreDiscount::class, $percentageDiscount);
    }

    public function test_it_should_calculate_correct_costs()
    {
        $buyable = $this->getMockForAbstractClass(BuyableInterface::class);
        $buyable->expects($this->once())
            ->method("costs")
            ->willReturn(10);

        $shoppingBagItem = new BuyLessGetMoreDiscount($buyable, 2, 3);
        $this->assertEquals(20, $shoppingBagItem->costs());
    }
}
