<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $product = new Product();

        $this->assertInstanceOf(Product::class, $product);
    }
} 