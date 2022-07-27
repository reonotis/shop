<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Log extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'instructor_id',
        'customer_id',
        'num',
        'date',
        'entry_time',
        'exit_time',
        'swim_time',
        'entry',
        'entry',
        'wether',
        'wave',
        'flow',
        'wind',
        'max_water_depth',
        'average_water_depth',
        'start_residual_pressure',
        'end_residual_pressure',
        'amount_residual_pressure',
    ];

    protected $dates = [
        'entry_time',
        'exit_time',
        'swim_time',
    ];

    /**
     *
     * @return object $result
     */
    public static function getByInstructor($id)
    {
        $select = '*';
        $result = self::select(DB::raw($select))
        ->where(function($query) use($id){
            // 自分がインストラクターとして潜っているログ
            $query->where('instructor_id',$id)
                    ->Where('customer_id', NULL);
        })
        // ->orWhere('customer_id', $id)   // 自分がcustomerとして潜っているログ
        ->where('delete_flag', 0)
        ->orderByRaw('date DESC, entry_time DESC')
        ->get();

        return $result;
    }

    /**
     *
     * @return object $result
     */
    public static function getByCustomer($id)
    {
        $select = '*';
        $result = self::select(DB::raw($select))
        ->where('customer_id', $id)
        ->where('delete_flag', 0)
        ->orderBy('num', 'DESC')
        ->get();

        return $result;
    }

}
