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
     * @param Product $aProduct
     */
    public function putProductIntoShoppingBag(Product $aProduct)
    {
        $id = $aProduct->identity();
        if (!isset($this->items[$id])) {
            $this->items[$id] = new ShoppingBagItem($aProduct);
        } else {
            $this->items[$id] = $this->items[$id]->oneMore();
        }
    }

    /**
     * @param Product $aProduct
     */
    public function removeProductFromShoppingBag(Product $aProduct)
    {
        $id = $aProduct->identity();
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
     * @return ShoppingBagItem[]
     */
    public function itemsInShoppingBag()
    {
        return $this->items;
    }

    /**
     * @param  Product $aProduct
     * @return bool
     */
    public function isProductInShoppingBag(Product $aProduct)
    {
        return isset($this->items[$aProduct->identity()]) && $this->items[$aProduct->identity()]->howOften() > 0;
    }

    /**
     * @param  Product $aProduct
     * @return int
     */
    public function howOftenIsProductInShoppingBag(Product $aProduct)
    {
        if (!$this->isProductInShoppingBag($aProduct)) {
            return 0;
        }

        return $this->items[$aProduct->identity()]->howOften();
    }
}
