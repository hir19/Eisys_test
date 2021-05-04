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

        $this->products = $products->paginate(15);

        return $this;
    }

    public function edit($product_id)
    {
        $this->product = Product::getProductById($product_id, 'ADMIN');

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
        //ファイル取得
        $upload_images = $request->file('images');

        if (!empty($upload_images)) {
            $count = 1;
            foreach($upload_images as $upload_image){
                $path = $upload_image->store('product_imgs',"public");
                $this->product->update([
                    'image_path'.$count => $path
                ]);
                $count ++;
            }
        }

        return $this;
    }

    public function targetProduct($product_id)
    {
        $this->product = Product::targetProductById($product_id);

        return $this;
    }

    public function targetDeleteImgs($delete_num)
    {
        // $upload_image = $request->file('image'.$num);
        // $this->product->where('image_path'.$delete_num, $image);

        // return $this;
    }

    public function updateImg($request)
    {
        $is_update_img = true;
        if($request->file('image1')){
            $num = 1;
        } elseif($request->file('image2')) {
            $num = 2;
        } elseif($request->file('image3')) {
            $num = 3;
        } elseif($request->file('image4')) {
            $num = 4;
        } elseif($request->file('image5')) {
            $num = 5;
        } else {
            $is_update_img = false;
        }

        if($is_update_img){
            $upload_image = $request->file('image'.$num);
        }

        if (!empty($upload_image)) {
            $path = $upload_image->store('product_imgs',"public");
                $this->product->update([
                    'image_path'.$num => $path,
                ]);
        }

        $this->product->update([
            'image_title1' => $request->name1,
            'image_title2' => $request->name2,
            'image_title3' => $request->name3,
            'image_title4' => $request->name4,
            'image_title5' => $request->name5,
        ]);

        return $this;
    }

    public function deleteImg()
    {
        $this->product->delete();

        return $this;
    }

}
