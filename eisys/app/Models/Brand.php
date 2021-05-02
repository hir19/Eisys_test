<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{

    const BRAND_TABLE = 'brands';

    protected $primaryKey = 'brand_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public static function getAllBrandsByShopId($shop_id)
    {
        return DB::table(self::BRAND_TABLE)
            ->where(self::BRAND_TABLE . '.shop_id', $shop_id)
            ->select([
                self::BRAND_TABLE . '.id',
                self::BRAND_TABLE . '.name',
            ])
            ->get();
    }
}
