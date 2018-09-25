<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Role extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('competence', function (Blueprint $table) {
            $table->increments('id')->comment('权限表');
            $table->string('name', 50)->default('')->comment('权限中文名称');
            $table->string('competence', 50)->default('')->comment('权限英文名称');
            $table->timestamps();
        });

        Schema::create('role', function (Blueprint $table) {
            $table->increments('id')->comment('后台角色表');
            $table->string('name', 50)->default('')->comment('角色名称');
            $table->string('competence', 500)->default('')->comment('权限集合');
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
        Schema::drop('competence');
        Schema::drop('role');
    }
}
