<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //后台管理员表
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id')->comment('后台管理表');
            $table->string('name', 50)->comment('管理员名称');
            $table->string('loginName', 20)->unique()->comment('登陆账号');
            $table->string('password', 250)->comment('密码');
            $table->string('random', 6)->comment('随机码');
            $table->string('token', 64)->unique()->nullable()->comment('验证码');
            $table->string('loginTime',13)->default(0)->comment('最后一次登陆时间');
            $table->tinyInteger('role')->default(1)->comment('角色');
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
        Schema::drop('admin');
    }
}
