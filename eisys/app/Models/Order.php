<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use SoftDeletes;

    const ORDER_TABLE = 'orders';
    const PRODUCT_TABLE = 'products';
    const USER_TABLE = 'users';
    const BRAND_TABLE = 'brands';
    const SHOP_TABLE = 'shops';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'is_delivered' => 'boolean',
    ];

    private static function displayDataInAdmin()
    {
        return [
            self::USER_TABLE . '.id as user_id',
            self::USER_TABLE . '.email',
            self::PRODUCT_TABLE . '.id as product_id',
            self::PRODUCT_TABLE . '.name as product_name',
            self::PRODUCT_TABLE . '.brand_id',
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
            self::ORDER_TABLE . '.created_at',
        ];
    }

    public static function getOrdersByShopId($shop_id, $keywords = null)
    {
        $display = self::displayDataInAdmin();

        return DB::table(self::ORDER_TABLE)
            ->select($display)
            ->leftJoin(self::USER_TABLE, self::USER_TABLE . '.id', self::ORDER_TABLE . '.user_id')
            ->leftJoin(self::PRODUCT_TABLE, self::PRODUCT_TABLE . '.id', self::ORDER_TABLE . '.product_id')
            ->join(self::BRAND_TABLE, self::PRODUCT_TABLE . '.brand_id', '=', self::BRAND_TABLE . '.id')
            ->join(self::SHOP_TABLE, self::BRAND_TABLE . '.shop_id', '=', self::SHOP_TABLE . '.id')
            ->when($keywords, function ($query, $search) {
                $query->where(self::USER_TABLE . '.email', 'LIKE', get_sql_like_word($search));
            })
            ->where(self::SHOP_TABLE . '.id', $shop_id)
            ->whereNull(self::ORDER_TABLE . '.deleted_at')
            ->orderBy(self::USER_TABLE . '.id', 'DESC');
    }
}
