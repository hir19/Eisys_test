<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTagRelation extends Model
{
    const PRODUCT_TAG_RELATION_TABLE = 'product_tag_relations';

    protected $primaryKey = 'product_tag_relation_id';

    protected $fillable = [
        'tag_id',
        'product_id'
    ];

}
