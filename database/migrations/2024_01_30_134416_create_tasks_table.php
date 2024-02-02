<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //up()には新しく追加する項目を記述
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); //constrainedで外部キー制約を追加し連携したテーブルのidの値のみ格納する
            $table->string('title'); //タスクのタイトルで文字列
            $table->text('description')->nullable();//タスクの説明 nullableでnull値を許可
            $table->boolean('completed')->default(false); //タスク完了を示すフラグ 真偽値で表現
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //down()には以前の状態に戻す(削除)する項目を追加
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
