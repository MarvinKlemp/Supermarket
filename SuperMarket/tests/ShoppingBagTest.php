<?php

namespace CodingKatas\SuperMarket\Tests;

use CodingKatas\SuperMarket\Product;
use CodingKatas\SuperMarket\ShoppingBag;
use CodingKatas\SuperMarket\ShoppingBagItem;

class ShoppingBagTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $shoppingBag = new ShoppingBag();

        $this->assertInstanceOf(ShoppingBag::class, $shoppingBag);
    }

    public function test_it_should_be_initializable_when_passing_an_array()
    {
        /** @var ShoppingBagItem $data */
        $data = [
            'id' => new ShoppingBagItem(
                $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock(),
                1
            ),
        ];
        $shoppingBag = new ShoppingBag($data);

        $this->assertSame([$data["id"]->product()], $shoppingBag->productsInShoppingBag());
    }

    public function test_is_product_in_shopping_bag_works_correctly()
    {
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $product->expects($this->any())
            ->method("identity")
            ->willReturn("id");
        $data = [
            'id' => new ShoppingBagItem(
                $product,
                1
            ),
        ];

        $shoppingBag = new ShoppingBag($data);

        $this->assertTrue($shoppingBag->isProductInShoppingBag($product));
    }

    public function test_it_should_put_products_into_shoppingbag()
    {
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $product->expects($this->any())
            ->method("identity")
            ->willReturn("id");

        $shoppingBag = new ShoppingBag();
        $shoppingBag->putProductIntoShoppingBag($product);

        $this->assertSame([$product], $shoppingBag->productsInShoppingBag());
        $this->assertTrue($shoppingBag->isProductInShoppingBag($product));
        $this->assertSame(1, $shoppingBag->howOftenIsProductInShoppingBag($product));
    }

    public function test_it_should_remove_products_from_shoppingbag()
    {
        $product = $this->getMockBuilder(Product::class)->disableOriginalConstructor()->getMock();
        $product->expects($this->any())
            ->method("identity")
            ->willReturn("id");
        $data = [
            'id' => new ShoppingBagItem(
                $product,
                1
            ),
        ];

        $shoppingBag = new ShoppingBag($data);
        $shoppingBag->removeProductFromShoppingBag($product);

        $this->assertSame([], $shoppingBag->productsInShoppingBag());
        $this->assertFalse($shoppingBag->isProductInShoppingBag($product));
        $this->assertSame(0, $shoppingBag->howOftenIsProductInShoppingBag($product));
    }
} 