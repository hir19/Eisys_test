<?php

namespace App\Services\Admin\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTagRelation;
use App\Models\Tag;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;

class ProductService extends BaseService
{
    public function index($shop_id, $keywords)
    {
        if ($shop_id == 0) {
            $products = Product::getProductsInAdmin($keywords);
        } else {
            $products = Product::getProductsByShopId($shop_id, $keywords);
        }

        return $products;
    }

    public function edit($product)
    {
        $this->product = Product::getProductById($product, 'ADMIN');

        return $this;
    }

    public function update($req)
    {
        $this->product = Product::updateProduct($req);

        return $this;
    }

    public function store($req)
    {
        $this->product = Product::storeProduct($req);

        return $this;
    }

    public function storeTags($tags)
    {
        if($tags){
            $product_id = $this->product->id;
            foreach($tags as $tag){
                ProductTagRelation::storeTagRelation($tag, $product_id);
            }
        }
        return $this;
    }

    public function updateTags($tags, $product_id)
    {
        if($tags){
            ProductTagRelation::ForceDeleteByProductId($product_id);
            foreach($tags as $tag){
                ProductTagRelation::storeTagRelation($tag, $product_id);
            }
        }

        return $this;
    }

    public function selectData()
    {
        $shop_id = Auth::user()->shop_id;

        $tag_ids = Tag::getAllTags();
        $category_ids = Category::getAllCategories();
        $brand_id = Brand::getAllBrandsByShopId($shop_id);

        $this->tag_arr = self::moldSelectData($tag_ids);
        $this->category_arr = self::moldSelectData($category_ids);
        $this->brand_arr = self::moldSelectData($brand_id);

        return $this;
    }

    public function oldTags($product_id)
    {
        $arr = ProductTagRelation::getTagIdByProductId($product_id);
        $tags = [];
        foreach($arr as $val){
            $tags[] = $val->tag_id;
        }
        $this->old_tags = $tags;

        return $this;
    }

    private static function moldSelectData($data)
    {
        $arr = [];
        foreach ($data as $str) {
            $arr += [$str->id => $str->name];
        }

        return $arr;
    }

    // 新規作成の時
    public function uploadImgs($request)
    {
        $files = $request->file('images');

        dd($files);

        // 保存先ルート
        $folder = dirname(__FILE__, 5) . '/product_imgs/';

        // // 新規フォルダの生成を行う
        // if (!file_exists($folder)) {
        //     mkdir($folder, 0777, true);
        // }

        // //あったら保存
        // if (!empty($files)) {
        //     foreach ($files as $file) {
        //         $file_name = $file->getClientOriginalName();
        //         move_uploaded_file($_FILES['images']['tmp_name'][0], $folder . $file_name);

        //         if (empty($this->mansion->image_upcoming_file_name1)) {
        //             $this->mansion->fill([
        //                 'image_upcoming_file_name1' => $file_name,
        //             ])->save();
        //         } elseif (empty($this->mansion->image_upcoming_file_name2)) {
        //             $this->mansion->fill([
        //                 'image_upcoming_file_name2' => $file_name,
        //             ])->save();
        //         } elseif (empty($this->mansion->image_upcoming_file_name3)) {
        //             $this->mansion->fill([
        //                 'image_upcoming_file_name3' => $file_name,
        //             ])->save();
        //         } elseif (empty($this->mansion->image_upcoming_file_name4)) {
        //             $this->mansion->fill([
        //                 'image_upcoming_file_name4' => $file_name,
        //             ])->save();
        //         } elseif (empty($this->mansion->image_upcoming_file_name5)) {
        //             $this->mansion->fill([
        //                 'image_upcoming_file_name5' => $file_name,
        //             ])->save();
        //         }
        //     }
        // }
        // return $this;
    }
}
