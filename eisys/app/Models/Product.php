<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use SoftDeletes;

    const PRODUCT_TABLE = 'products';
    const CATEGORY_TABLE = 'categories';
    const SHOP_TABLE = 'shops';
    const BRAND_TABLE = 'brands';
    const TAG_TABLE = 'tags';
    const PRODUCT_TAG_RELATION_TABLE = 'product_tag_relations';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id',
        'brand_id',
        'image_path1',
        'image_path2',
        'image_path3',
        'image_path4',
        'image_path5',
        'image_title1',
        'image_title2',
        'image_title3',
        'image_title4',
        'image_title5',
        'description',
    ];
    protected $dates = ['deleted_at'];

    private static function displayData()
    {
        return [
            self::CATEGORY_TABLE . '.id as category_id',
            self::CATEGORY_TABLE . '.name as category_name',
            self::BRAND_TABLE . '.id as brand_id',
            self::BRAND_TABLE . '.name as brand_name',
            self::PRODUCT_TABLE . '.id as product_id',
            self::PRODUCT_TABLE . '.name',
            self::PRODUCT_TABLE . '.price',
            self::PRODUCT_TABLE . '.quantity',
            self::PRODUCT_TABLE . '.image_path1',
            self::PRODUCT_TABLE . '.image_path2',
            self::PRODUCT_TABLE . '.image_path3',
            self::PRODUCT_TABLE . '.image_path4',
            self::PRODUCT_TABLE . '.image_path5',
            self::PRODUCT_TABLE . '.image_title1',
            self::PRODUCT_TABLE . '.image_title2',
            self::PRODUCT_TABLE . '.image_title3',
            self::PRODUCT_TABLE . '.image_title4',
            self::PRODUCT_TABLE . '.image_title5',
            self::PRODUCT_TABLE . '.description',
        ];
    }

    private static function displayDataInAdmin()
    {
        return [
            self::CATEGORY_TABLE . '.id as category_id',
            self::CATEGORY_TABLE . '.name as category_name',
            self::BRAND_TABLE . '.id as brand_id',
            self::BRAND_TABLE . '.name as brand_name',
            self::SHOP_TABLE . '.id as shop_id',
            self::SHOP_TABLE . '.name as shop_name',
            self::PRODUCT_TABLE . '.id as product_id',
            self::PRODUCT_TABLE . '.name',
            self::PRODUCT_TABLE . '.price',
            self::PRODUCT_TABLE . '.quantity',
            self::PRODUCT_TABLE . '.image_path1',
            self::PRODUCT_TABLE . '.image_path2',
            self::PRODUCT_TABLE . '.image_path3',
            self::PRODUCT_TABLE . '.image_path4',
            self::PRODUCT_TABLE . '.image_path5',
            self::PRODUCT_TABLE . '.image_title1',
            self::PRODUCT_TABLE . '.image_title2',
            self::PRODUCT_TABLE . '.image_title3',
            self::PRODUCT_TABLE . '.image_title4',
            self::PRODUCT_TABLE . '.image_title5',
            self::PRODUCT_TABLE . '.description',
            self::PRODUCT_TABLE . '.created_at',
            self::PRODUCT_TABLE . '.updated_at',
        ];
    }

    public static function getAllProducts()
    {
        $display = self::displayData();

        return DB::table(self::PRODUCT_TABLE)
            ->select($display)
            ->leftJoin(self::CATEGORY_TABLE, self::CATEGORY_TABLE . '.id', self::PRODUCT_TABLE . '.category_id')
            ->leftJoin(self::BRAND_TABLE, self::BRAND_TABLE . '.id', self::PRODUCT_TABLE . '.brand_id')
            ->where(self::PRODUCT_TABLE . '.quantity', ">", 0)
            ->whereNull(self::PRODUCT_TABLE . '.deleted_at');
    }

    public static function getProductById($product_id, $admin = null)
    {
        $display = self::displayData();

        return DB::table(self::PRODUCT_TABLE)
            ->select($display)
            ->where(self::PRODUCT_TABLE . '.id', $product_id)
            ->leftJoin(self::CATEGORY_TABLE, self::CATEGORY_TABLE . '.id', self::PRODUCT_TABLE . '.category_id')
            ->leftJoin(self::BRAND_TABLE, self::BRAND_TABLE . '.id', self::PRODUCT_TABLE . '.brand_id')
            ->when($admin, function ($query) {
                $query->where(self::PRODUCT_TABLE . '.quantity', ">", 0);
            })
            ->whereNull(self::PRODUCT_TABLE . '.deleted_at')
            ->first();
    }

    public static function searchProductionsBySearchConditions($keywords, $category_id, $tag_ids, $price)
    {
        $product_query = Product::query();
        $display = self::displayData();

        $product_query->select($display)
            ->join(self::PRODUCT_TAG_RELATION_TABLE, self::PRODUCT_TABLE . '.id', '=', self::PRODUCT_TAG_RELATION_TABLE . '.product_id')
            ->join(self::TAG_TABLE, self::PRODUCT_TAG_RELATION_TABLE . '.tag_id', '=', self::TAG_TABLE . '.id')
            ->leftJoin(self::CATEGORY_TABLE, self::CATEGORY_TABLE . '.id', self::PRODUCT_TABLE . '.category_id')
            ->leftJoin(self::BRAND_TABLE, self::BRAND_TABLE . '.id', self::PRODUCT_TABLE . '.brand_id')
            ->where(self::PRODUCT_TABLE . '.quantity', ">", 0)
            ->whereNull(self::PRODUCT_TABLE . '.deleted_at')
            ->when($keywords, function ($query, $search) {
                var_dump('keyword');
                $query->where(self::PRODUCT_TABLE . '.name', 'LIKE', get_sql_like_word($search));
            })
            ->when($category_id, function ($query, $search) {
                var_dump('category_id');
                $query->where(self::PRODUCT_TABLE . '.category_id', $search);
            })
            ->when($price, function ($query, $search) {
                var_dump('price');
                $query->where(self::PRODUCT_TABLE . '.price', "<=", $search);
            });

        // if($tag_ids){
        //     $count = count($tag_ids);
        //     for ($i=0; $i < $count; $i++) {
        //         $product_query->orWhere(self::PRODUCT_TAG_RELATION_TABLE . '.tag_id', $tag_ids[$i]);
        //     }
        // }

        return $product_query;
    }

    public static function getProductsInAdmin($keywords = null)
    {
        $display = self::displayDataInAdmin();

        return DB::table(self::PRODUCT_TABLE)
            ->select($display)
            ->leftJoin(self::CATEGORY_TABLE, self::CATEGORY_TABLE . '.id', self::PRODUCT_TABLE . '.category_id')
            ->join(self::BRAND_TABLE, self::PRODUCT_TABLE . '.brand_id', '=', self::BRAND_TABLE . '.id')
            ->join(self::SHOP_TABLE, self::BRAND_TABLE . '.shop_id', '=', self::SHOP_TABLE . '.id')
            ->when($keywords, function ($query, $search) {
                $query->where(self::PRODUCT_TABLE . '.name', 'LIKE', get_sql_like_word($search));
            })
            ->whereNull(self::PRODUCT_TABLE . '.deleted_at')
            ->get();
    }

    public static function getProductsByShopId($shop_id, $keywords = null)
    {
        $display = self::displayDataInAdmin();

        return DB::table(self::PRODUCT_TABLE)
            ->select($display)
            ->leftJoin(self::CATEGORY_TABLE, self::CATEGORY_TABLE . '.id', self::PRODUCT_TABLE . '.category_id')
            ->join(self::BRAND_TABLE, self::PRODUCT_TABLE . '.brand_id', '=', self::BRAND_TABLE . '.id')
            ->join(self::SHOP_TABLE, self::BRAND_TABLE . '.shop_id', '=', self::SHOP_TABLE . '.id')
            ->when($keywords, function ($query, $search) {
                $query->where(self::PRODUCT_TABLE . '.name', 'LIKE', get_sql_like_word($search));
            })
            ->where(self::SHOP_TABLE . '.id', $shop_id)
            ->whereNull(self::PRODUCT_TABLE . '.deleted_at')
            ->get();
    }

    public static function updateProduct($req)
    {
        return DB::table(self::PRODUCT_TABLE)
            ->where(self::PRODUCT_TABLE . '.id', $req->product_id)
            ->update(
                [
                    self::PRODUCT_TABLE . '.name' => $req->name,
                    self::PRODUCT_TABLE . '.quantity' => $req->quantity,
                    self::PRODUCT_TABLE . '.price' => $req->price,
                    self::PRODUCT_TABLE . '.description' => $req->description,
                    self::PRODUCT_TABLE . '.category_id' => $req->category_id,
                    self::PRODUCT_TABLE . '.brand_id' => $req->brand_id,
                    ]);
    }

    public static function storeProduct($req)
    {
        return self::create([
                'name' => $req->name,
                'quantity' => $req->quantity,
                'price' => $req->price,
                'description' => $req->description,
                'category_id' => $req->category_id,
                'brand_id' => $req->category_id,
            ]);
    }
}
