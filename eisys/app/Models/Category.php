<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    const CATEGORY_TABLE = 'categories';

    protected $primaryKey = 'category_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public static function getAllCategories()
    {
        return DB::table(self::CATEGORY_TABLE)
            ->select([
                self::CATEGORY_TABLE . '.id',
                self::CATEGORY_TABLE . '.name',
            ])
            ->get();
    }
}
