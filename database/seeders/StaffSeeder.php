<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            'name' => '藤澤',
            'email' => 'fujisawa@reonotis.jp',
            'password' => Hash::make('test'),
        ]);
    }
}
