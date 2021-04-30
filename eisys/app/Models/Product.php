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
    const BRAND_TABLE = 'brands';

    protected $primaryKey = 'product_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'quantity',
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

    public static function getAllProducts()
    {
        return DB::table(self::PRODUCT_TABLE)
            ->select(
                self::CATEGORY_TABLE . '.id as category_id',
                self::CATEGORY_TABLE . '.name as category_name',
                self::BRAND_TABLE . '.id as brand_id',
                self::BRAND_TABLE . '.name as brand_name',
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
                )
            ->leftJoin(self::CATEGORY_TABLE, self::CATEGORY_TABLE . '.id', self::PRODUCT_TABLE . '.category_id')
            ->leftJoin(self::BRAND_TABLE, self::BRAND_TABLE . '.id', self::PRODUCT_TABLE . '.brand_id')
            ->whereNull(self::PRODUCT_TABLE . '.deleted_at')
            // ->get();
            // ->paginate(15);
            ->simplePaginate(15);
    }

}
