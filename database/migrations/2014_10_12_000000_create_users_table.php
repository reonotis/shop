<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()                                        ->comment('ID');
            $table->string('name')                              ->comment('スタッフ名');
            $table->string('email')->unique()                   ->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')                          ->comment('パスワード');
            $table->rememberToken();
            $table->integer('customer_id')->unsigned()          ->comment('顧客ID');

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
        Schema::dropIfExists('users');
    }
}
