<?php

namespace CodingKatas\SuperMarket\ShoppingBag;

use CodingKatas\SuperMarket\Product;

class ShoppingBag
{
    /**
     * @var ShoppingBagItem[]
     */
    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @param Product $product
     */
    public function putProductIntoShoppingBag(Product $product)
    {
        $id = $product->identity();
        if (!isset($this->items[$id])) {
            $this->items[$id] = new ShoppingBagItem($product, 1);
        } else {
            $this->items[$id] = $this->items[$id]->oneMore();
        }
    }

    /**
     * @param Product $product
     */
    public function removeProductFromShoppingBag(Product $product)
    {
        $id = $product->identity();
        if (!isset($this->items[$id])) {
            return;
        }

        if ($this->items[$id]->howOften() > 0) {
            $this->items[$id] = $this->items[$id]->oneLess();
        }
    }

    /**
     * @return Product[]
     */
    public function productsInShoppingBag()
    {
        $res = [];

        foreach ($this->items as $item) {
            if ($item->howOften() > 0) {
                $res[] = $item->product();
            }
        }

        return $res;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function isProductInShoppingBag(Product $product)
    {
        return isset($this->items[$product->identity()]) && $this->items[$product->identity()]->howOften() > 0;
    }

    /**
     * @param Product $product
     * @return int
     */
    public function howOftenIsProductInShoppingBag(Product $product)
    {
        if (!$this->isProductInShoppingBag($product)) {
            return 0;
        }

        return $this->items[$product->identity()]->howOften();
    }
} 