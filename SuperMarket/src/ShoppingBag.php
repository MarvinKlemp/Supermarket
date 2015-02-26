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

    public function __construct()
    {
        $this->products = [];
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
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
        // @TODO get prooducts
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function hasProduct(Product $product)
    {
        return isset($this->products[$product->identity()]);
    }

    /**
     * @param Product $product
     * @return int
     */
    public function getProductCount(Product $product)
    {
        if (!$this->hasProduct($product)) {
            return 0;
        }

        return $this->products[$product->identity()]['count'];
    }
} 