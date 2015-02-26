<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Product;
use CodingKatas\SuperMarket\ShoppingBag;

class ShoppingBagTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $shoppingBag = new ShoppingBag();
    }

    public function test_it_should_be_initializable_when_passing_an_array()
    {
        $data = [
            'some' => [
                'object' => $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock(),
                'count' => 0
            ]
        ];
        $shoppingBag = new ShoppingBag($data);

        $this->assertSame($data, $shoppingBag->getProducts());
    }

    public function test_has_product_works_correctly()
    {
        $shoppingBag = new ShoppingBag();
    }
} 