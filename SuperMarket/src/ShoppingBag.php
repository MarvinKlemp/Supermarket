<?php

namespace CodingKatas\SuperMarket;

class ShoppingBag
{
    /**
     * @var Product[]
     */
    protected $products;

    /**
     * @var array
     */
    protected $productsCount;

    public function __construct(array $products = [])
    {
        $this->products = $products;
    }

    /**
     * @param Product $product
     */
    public function putProductInShoppingBag(Product $product)
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
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @return Product[]
     */
    public function productsInShoppingBag()
    {
        $res = [];

        foreach ($this->products as $pc) {
            $res[] = $pc['object'];
        }

        return $res;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function isProductInShoppingBag(Product $product)
    {
        return isset($this->products[$product->identity()]);
    }

    /**
     * @param Product $product
     * @return int
     */
    public function getProductCount(Product $product)
    {
        if (!$this->isProductInShoppingBag($product)) {
            return 0;
        }

        return $this->products[$product->identity()]['count'];
    }
} 