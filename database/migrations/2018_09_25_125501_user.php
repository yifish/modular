<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id')->comment('用户表');
            $table->string('name', 50)->default('')->comment('名称');
            $table->string('loginName', 20)->unique()->comment('登录账号');
            $table->string('phone', 20)->unique()->comment('手机号');
            $table->string('password', 250)->comment('密码');
            $table->string('random', 6)->comment('随机码');
            $table->string('token', 64)->unique()->nullable()->comment('验证码');
            $table->string('loginTime',13)->default(0)->comment('最后一次登陆时间');
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
        Schema::drop('user');
    }
}
