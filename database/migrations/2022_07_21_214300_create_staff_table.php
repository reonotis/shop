<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id()                                        ->comment('ID');
            $table->string('name')->nullable()                  ->comment('スタッフ名');
            $table->string('email')->unique()                   ->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')                          ->comment('パスワード');
            $table->rememberToken();
            $table->boolean('first_password_setting')->default('0')->comment('初期パスワード設定  0:未実施 1:実施済み');

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
        Schema::dropIfExists('staffs');
    }
}
