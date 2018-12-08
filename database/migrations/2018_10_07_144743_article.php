<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id')->comment('文章表');
            $table->integer('publisherId')->default(0)->comment('发布人');
            $table->integer('classId')->default(0)->comment('分类id');
            $table->string('publisherName', 50)->default('')->comment('发布人姓名');
            $table->tinyInteger('types')->default(0)->comment('类型，默认0:没有发布人1:管理员2:用户');
            $table->string('thumbnail', 300)->default('')->comment('缩略图');
            $table->string('intro', 300)->default('')->comment('简介');
            $table->string('title', 300)->default('')->comment('标题');
            $table->text('content')->nullable()->comment('文章内容');
            $table->tinyInteger('status')->default(0)->comment('类型，默认0:未审核1:通过2:拒绝');
            $table->integer('give')->default(0)->comment('点赞');
            $table->string('releaseTime', 13)->default(0)->comment('发布时间');
            $table->timestamps();
        });

        Schema::create('article_class', function (Blueprint $table) {
            $table->increments('id')->comment('文章分类表');
            $table->string('name', 50)->default('')->comment('分类名称');
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
        Schema::drop('article');
        Schema::drop('article_class');
    }
}
