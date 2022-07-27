<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerLicenses extends Model
{
    use HasFactory;

    /**
     *
     * @return object $result
     */
    public static function getByCustomer($id)
    {
        $select = '*';
        $result = self::select(DB::raw($select))
        ->join('licenses', 'customer_licenses.license_id', '=', 'licenses.id')
        ->where('customer_licenses.customer_id', $id)
        ->where('customer_licenses.delete_flag', 0)
        ->where('licenses.delete_flag', 0)
        ->get();

        return $result;
    }
}
