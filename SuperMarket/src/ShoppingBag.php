<?php

namespace CodingKatas\SuperMarket;

use CodingKatas\SuperMarket\Events\ProductWasRemovedFromShoppingBag;

class ShoppingBag
{
    /**
     * @var Product[]
     */
    protected $products;

    public function __construct(array $products = [])
    {
        $this->products = $products;
    }

    /**
     * @param Product $product
     */
    public function putProductIntoShoppingBag(Product $product)
    {
        $id = $product->identity();
        if (!isset($this->products[$id])) {
            $this->products[$id] = [
                'object' => $product,
                'count' => 1
            ];
        } else {
            $this->products[$id]['count']++;
        }
    }

    /**
     * @param Product $product
     */
    public function removeProductFromShoppingBag(Product $product)
    {
        $id = $product->identity();
        if (!isset($this->products[$id])) {
            return;
        }

        if ($this->products[$id]['count'] > 0) {
            $this->products[$id]['count']--;
        }
    }

    /**
     * @return Product[]
     */
    public function productsInShoppingBag()
    {
        $res = [];

        foreach ($this->products as $pc) {
            if ($pc['count'] > 0) {
                $res[] = $pc['object'];
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
        return isset($this->products[$product->identity()]) && $this->products[$product->identity()]['count'] > 0;
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

        return $this->products[$product->identity()]['count'];
    }
} 