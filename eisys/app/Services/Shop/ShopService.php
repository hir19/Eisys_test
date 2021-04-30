<?php

namespace App\Services\Shop;

use App\Services\BaseService;
use App\Models\Product;

class ShopService extends BaseService
{
    public function test()
    {
        $all_products = Product::getAllProducts();
        return $all_products;
    }
}
