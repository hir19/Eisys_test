<?php

namespace App\Services\Shop;

use App\Models\Product;
use App\Services\BaseService;

class ShopService extends BaseService
{
    private function index()
    {
        $products = Product::getAllProducts();

        return $products;
    }

    private static function search($keywords, $category_id, $tag_ids, $price)
    {
        $products = Product::searchProductionsBySearchConditions($keywords, $category_id, $tag_ids, $price);

        return $products;
    }

    public function makeCompactData()
    {
        return $this;
    }

    public function existSearchQuery($query)
    {
        $keywords = isset($query['keywords']) ? $query['keywords'] : null;
        $category_id = isset($query['category_id']) ? $query['category_id'] : null;
        $tag_ids = isset($query['tag_ids']) ? $query['tag_ids'] : null;
        $price = isset($query['price']) ? $query['price'] : null;

        // 検索した条件の保持
        self::holdOldQuery($keywords, $category_id, $tag_ids, $price);

        if ($keywords || $category_id || $price || $tag_ids) {
            $product_query = self::search($keywords, $category_id, $tag_ids, $price);
        } else {
            $product_query = self::index();
        }

        $this->total = $product_query->count();
        $this->products = $product_query->paginate(15);

        return $this;
    }

    private function holdOldQuery($keywords, $category_id, $tag_ids, $price)
    {
        $this->oldQuery['keywords'] = $keywords;
        $this->oldQuery['category_id'] = $category_id;
        $this->oldQuery['tag_ids'] = $tag_ids;
        $this->oldQuery['price'] = $price;

        return $this;
    }

    public function detail($product_id)
    {
        $product = Product::getProductById($product_id);
        return $product;
    }
}
