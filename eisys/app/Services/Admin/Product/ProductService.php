<?php

namespace App\Services\Admin\Product;

use App\Models\Product;
use App\Services\BaseService;

class ProductService extends BaseService
{
    public static function index($shop_id)
    {
        if($shop_id == 0){
            $products = Product::getProductsInAdmin();
        } else {
            $products = Product::getProductsByShopId($shop_id);
        }

        return $products;
    }

    public static function edit($product)
    {
        $product = Product::getProductById($product, 'ADMIN');

        return $product;
    }
}
