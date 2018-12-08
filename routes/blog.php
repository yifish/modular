<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 15:07
 */

Route::group(['namespace' => 'Blog'],function () {
    Route::get('/', 'Index@index');
});
