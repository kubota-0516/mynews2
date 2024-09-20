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
     // title と body と image_path を追記
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
           
            $table->id();//レコードが新規作成される際に自動で埋まる
            $table->string('title');//ニュースのタイトルを保存するカラム
            $table->string('body');//ニュースの本文を保存するカラム
            $table->string('image_path')->nullable();//画像のパスを保存するカラム（空でも保存できます意）
            $table->timestamps();//レコードが新規作成される際に自動で埋まる
           
            //image_path以外の4つは保存時に必ず値が入るカラムの設定
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
        //関数downにはmigrationの取り消しを行うためのコードを書く
        //ここでは「もしnewsというテーブルが存在すれば削除する」と書かれている
    }
};
