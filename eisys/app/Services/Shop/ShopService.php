<?php

namespace App\Services\Shop;

use App\Services\BaseService;
use App\Models\Product;

class ShopService extends BaseService
{
    public function index()
    {
        $all_products = Product::getAllProducts();
        return $all_products;
    }

    public function detail($product_id)
    {
        $product = Product::getProductById($product_id);
        return $product;
    }
}
