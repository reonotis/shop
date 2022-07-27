<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => '藤澤',
            'email' => 'fujisawa@reonotis.jp',
            'password' => Hash::make('test'),
            'user_id' => 1,
        ]);
    }
}
