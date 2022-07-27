<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;




    /**
     * Undocumented function
     *
     * @param array $shopInsertData
     * @return bool|object
     */
    public static function getByShopId(int $shopId)
    {
        try {
            return self::select('*')->where('shop_id', $shopId)->get();
        } catch (Exception $e) {
            dd($e->getMessage(), 111);
            return false;
        }
    }

}
