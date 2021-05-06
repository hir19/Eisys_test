<?php

namespace App\Customs;

use Carbon\Carbon;

class CustomDate
{

    const DATETIME_FORMAT = "Y-m-d H:i:s";
    const TIMEZONE = "Asia/Tokyo";

    /**
     * 現在の日時を取得する
     * @return string
     */
    public static function now()
    {
        return Carbon::now()->format(self::DATETIME_FORMAT);
    }

}
