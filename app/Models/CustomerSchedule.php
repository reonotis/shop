<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerSchedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'schedule_id',
        'customer_id',
    ];

    /**
     * @param int $scheduleId
     */
    public function getCustomerScheduleByScheduleId(int $scheduleId)
    {
        $select = 'customer_schedules.*,
                    customers.f_name';
        $result = self::select(DB::raw($select))
        ->join('customers', 'customer_schedules.customer_id', '=', 'customers.id')
        ->where('customer_schedules.schedule_id', $scheduleId)
        ->where('customer_schedules.delete_flag', 0)
        ->where('customers.delete_flag', 0)
        ->get();

        return $result;
    }
}
