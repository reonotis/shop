<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;


class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $insertData = array();
        $insertData[] = [
            'shop_name' => 'test',
            'email' => 'test@test.jp',
        ];
        for($i = 1 ; $i<100 ; $i++ ){
            $insertData[] = [
                'shop_name' => '店舗名_' . str_pad($i, 3, 0, STR_PAD_LEFT),
                'email' => 'test_mail_' . str_pad($i, 3, 0, STR_PAD_LEFT) . '@test.jp',
            ];
        }

        DB::table('shops')->insert($insertData);
    }
}
