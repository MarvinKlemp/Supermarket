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
} 