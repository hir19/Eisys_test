<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{

    const TAG_TABLE = 'tags';

    protected $primaryKey = 'tag_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public static function getAllTags()
    {
        return DB::table(self::TAG_TABLE)
            ->select([
                self::TAG_TABLE . '.id',
                self::TAG_TABLE . '.name',
            ])
            ->get();
    }
}
