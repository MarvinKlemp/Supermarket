<?php

namespace MarvinKlemp\SuperMarket\Tests;

use MarvinKlemp\SuperMarket\Collection\BuyableStorageInterface;
use MarvinKlemp\SuperMarket\ShoppingBag;

class ShoppingBagTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $storage = $this->getMockForAbstractClass(BuyableStorageInterface::class);
        $s = new ShoppingBag($storage);

        $this->assertInstanceOf(ShoppingBag::class, $s);
    }
}
