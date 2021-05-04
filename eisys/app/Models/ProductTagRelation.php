<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductTagRelation extends Model
{
    const PRODUCT_TAG_RELATION_TABLE = 'product_tag_relations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tag_id',
        'product_id'
    ];

    public static function storeTagRelation($tag, $product_id)
    {
        return self::create([
            'tag_id' => $tag,
            'product_id' => $product_id,
        ]);
    }

    public static function forceDeleteByProductId($product_id)
    {
        return DB::table(self::PRODUCT_TAG_RELATION_TABLE)
            ->where(self::PRODUCT_TAG_RELATION_TABLE . '.product_id', $product_id)
            ->delete();
    }

    public static function getTagIdByProductId($product_id)
    {
        return DB::table(self::PRODUCT_TAG_RELATION_TABLE)
            ->select(self::PRODUCT_TAG_RELATION_TABLE . '.tag_id')
            ->where(self::PRODUCT_TAG_RELATION_TABLE . '.product_id', $product_id)
            ->get();
    }

}
