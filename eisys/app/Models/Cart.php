<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use SoftDeletes;

    const PRODUCT_TABLE = 'products';
    const USER_TABLE = 'users';
    const CART_TABLE = 'carts';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity'
    ];

    public static function getCartByUserId($user_id)
    {
        return DB::table(self::CART_TABLE)
            ->where(self::CART_TABLE . '.user_id', $user_id)
            ->get();
    }

    public static function createCart($product_id, $quantity, $user_id)
    {
        return self::create([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'quantity' => $quantity,
        ]);
    }

    public static function findCartByIds($cart_id, $user_id)
    {
        return DB::table(self::CART_TABLE)
            ->select([
                self::CART_TABLE . '.quantity',
                self::CART_TABLE . '.id as cart_id',
                ])
            ->where(self::CART_TABLE . '.id', $cart_id)
            ->where(self::CART_TABLE . '.user_id', $user_id)
            ->first();
    }

    public static function deleteCartById($cart_id)
    {
        return DB::table(self::CART_TABLE)
            ->where(self::CART_TABLE . '.id', $cart_id)
            ->delete();
    }

    public static function updateQuantity($cart_id, $quantity)
    {
        return DB::table(self::CART_TABLE)
            ->where(self::CART_TABLE . '.id', $cart_id)
            ->update([self::CART_TABLE . '.quantity' => $quantity]);
    }

}