<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Banner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('banner', function (Blueprint $table) {
            $table->increments('id')->comment('轮播图表');
            $table->string('thumbnail', 300)->default('')->comment('图片地址');
            $table->tinyInteger('status')->default(0)->comment('类型，默认0:不显示 1:显示 2:不显示');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('banner');
    }
}
