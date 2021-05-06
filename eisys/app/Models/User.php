<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const USER_TABLE = 'users';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'points',
        'phone',
        'email',
        'address1',
        'address2',
        'zip_code',
        'state',
        'city',
        'country',
        'password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private static function displayDataInAdmin()
    {
        return [
            self::USER_TABLE . '.id as user_id',
            self::USER_TABLE . '.email',
            self::USER_TABLE . '.first_name',
            self::USER_TABLE . '.last_name',
            self::USER_TABLE . '.created_at',
        ];
    }

    public static function getAllUsersBySearch($keywords = null)
    {
        $display = self::displayDataInAdmin();

        return DB::table(self::USER_TABLE)
            ->select($display)
            ->when($keywords, function ($query, $search) {
                $query->where(self::USER_TABLE . '.email', 'LIKE', get_sql_like_word($search));
            })
            ->whereNull(self::USER_TABLE . '.deleted_at')
            ->orderBy(self::USER_TABLE . '.created_at', 'DESC');
    }
}
