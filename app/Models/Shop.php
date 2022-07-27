<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    /**
     * 複数代入可能な属性
     * @var array
     */
    protected $fillable = [
        'shop_name',
        'email',
    ];

    /**
     * Undocumented function
     *
     * @param array $shopInsertData
     * @return bool|object
     */
    public static function insertShop(array $shopInsertData)
    {
        try {
            return self::create($shopInsertData);
        } catch (Exception $e) {
            dd($e->getMessage(), 111);
            return false;
        }
    }


    public static function getShopByEmail(string $email)
    {
        try {
            return self::select('*')->where('email', $email)->first();
        } catch (Exception $e) {
            dd($e->getMessage(), 111);
            return false;
        }
    }


}
