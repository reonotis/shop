<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Consts\DatabaseConst;

class ShopUserBelong extends Model
{
    use HasFactory;

    /**
     * 複数代入可能な属性
     * @var array
     */
    protected $fillable = [
        'shop_id',
        'staff_id',
    ];

    /**
     * ショップに紐づくスタッフを取得する
     *
     * @param integer $id
     * @return bool|object
     */
    public static function getStaffByShopId(int $id)
    {
        try {
            return self::select('*')
                ->join('staffs', 'staffs.id', '=', 'shop_user_belongs.staff_id')
                ->where('shop_id', $id)
                ->where('staffs.delete_flag', DatabaseConst::FLAG_OFF)
                ->get();
        } catch (Exception $e) {
            dd($e->getMessage(), 'getStaffByShopId');
            return false;
        }
    }

    /**
     * スタッフに紐づくショップを取得する
     *
     * @param integer $id
     * @return bool|object
     */
    public static function getStaffByStaffId(int $staffId)
    {
        try {
            return self::select('*')
                ->join('shops', 'shops.id', '=', 'shop_user_belongs.shop_id')
                ->where('staff_id', $staffId)
                ->where('shops.delete_flag', DatabaseConst::FLAG_OFF)
                ->get();
        } catch (Exception $e) {
            dd($e->getMessage(), 'getStaffByShopId');
            return false;
        }
    }

    public static function checkSelectableShop(int $shopId, int $staffId)
    {
        try {
            return self::select('*')
                ->where('staff_id', $staffId)
                ->where('shop_id', $shopId)
                ->first();
        } catch (Exception $e) {
            dd($e->getMessage(), 'getStaffByShopId');
            return false;
        }
    }


}