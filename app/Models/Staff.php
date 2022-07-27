<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory;

    /**
     * モデルと関連しているテーブル
     * @var string
     */
    protected $table = 'staffs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public static function getStaffByEmail(string $email)
    {
        try {
            return self::select('*')->where('email', $email)->first();
        } catch (Exception $e) {
            dd($e->getMessage(), 111);
            return false;
        }
    }


    /**
     * Undocumented function
     *
     * @param array $shopInsertData
     * @return bool|object
     */
    public static function insertStaff(array $shopInsertData)
    {
        try {
            return self::create($shopInsertData);
        } catch (Exception $e) {
            dd($e->getMessage(), 111);
            return false;
        }
    }




}