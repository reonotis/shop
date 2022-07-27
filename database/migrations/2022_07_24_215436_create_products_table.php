<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()                                        ->comment('ID');
            $table->unsignedInteger('shop_id')                  ->comment('ショップID');
            $table->string('name')->nullable()                  ->comment('商品名');
            $table->unsignedInteger('price')->nullable()        ->comment('金額');
            $table->timestamp('sales_start_date')->nullable()   ->comment('販売開始日時');
            $table->timestamp('sales_end_date')->nullable()     ->comment('販売終了日時');

            $table->boolean('display_flag')->default('0')       ->comment('表示フラグ  0:非表示  1:表示');

            $table->timestamp('created_at')    ->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日時')	;
            $table->timestamp('updated_at')    ->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日時');
            $table->boolean('delete_flag')     ->default('0')->comment('削除フラグ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
