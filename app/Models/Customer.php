<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'f_name',
        'l_name',
        'l_read',
        'f_read',
    ];

    /**
     *
     * @return object $result
     */
    public static function getByCondition():object
    {
        $select = '
            customers.id,
            customers.f_name,
            customers.l_name,
            customers.l_read,
            customers.f_read,
            customer_infos.tel,
            customer_infos.email,
            customer_infos.zip21,
            customer_infos.zip22,
            customer_infos.pref21,
            customer_infos.addr21,
            customer_infos.street21,
            customer_infos.sex
        ';
        $result = self::select(DB::raw($select))
        ->where('customers.delete_flag', 0)
        ->leftJoin('customer_infos', 'customers.id', '=', 'customer_infos.customer_id')
        ->paginate(20);

        return $result;
    }

    /**
     *
     * @return object $result
     */
    public static function getById($id)
    {
        $select = '
            customers.id,
            customers.f_name,
            customers.l_name,
            customers.l_read,
            customers.f_read,
            customer_infos.tel,
            customer_infos.email,
            customer_infos.zip21,
            customer_infos.zip22,
            customer_infos.pref21,
            customer_infos.addr21,
            customer_infos.street21,
            customer_infos.sex
        ';
        $result = self::select(DB::raw($select))
        ->where('customers.delete_flag', 0)
        ->leftJoin('customer_infos', 'customers.id', '=', 'customer_infos.customer_id')
        ->find($id);

        return $result;
    }

}