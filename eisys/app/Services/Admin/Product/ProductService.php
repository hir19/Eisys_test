<?php

namespace App\Services\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Services\BaseService;

class ProductService extends BaseService
{
    public function index($shop_id)
    {
        if($shop_id == 0){
            $products = Product::getProductsInAdmin();
        } else {
            $products = Product::getProductsByShopId($shop_id);
        }

        return $products;
    }

    public function edit($product)
    {
        $this->product = Product::getProductById($product, 'ADMIN');

        return $this;
    }

    public function selectData()
    {
        $tag_ids = Tag::getAllTags();
        $category_ids = Category::getAllCategories();

        $this->tag_arr = self::moldSelectData($tag_ids);
        $this->category_arr = self::moldSelectData($category_ids);

        return $this;
    }

    private static function moldSelectData($data)
    {
        $arr = [];
        foreach($data as $str){
            $arr += [$str->id => $str->name];
        }

        return $arr;
    }
}
