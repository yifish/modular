<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'AdminWeb'],function () {
    Route::get('login', 'Login@login');
    Route::get('logout', 'Login@logout');
    Route::get('home', 'Home@index')->middleware('AdminWeb');
    Route::post('/login/loginPost','Login@loginPost');
    /* 管理员curd */
    Route::any('adminList', 'AdminWeb@adminList')->middleware('webRole:adminList');
    Route::get('adminCreate', 'AdminWeb@adminCreate')->middleware('webRole:adminCreate');
    Route::get('adminUpdate/{admin?}', 'AdminWeb@adminUpdate')->middleware('webRole:adminUpdate');
    Route::post('createAdminPost', 'AdminWeb@createAdminPost')->middleware('webRole:adminCreate');
    Route::post('updateAdminPost', 'AdminWeb@updateAdminPost')->middleware('webRole:adminUpdate');
    Route::get('adminDelete/{admin?}', 'AdminWeb@adminDelete')->middleware('webRole:adminDelete');
    /* 角色curd */
    Route::any('roleList', 'Role@roleList')->middleware('webRole:roleList');
    Route::get('roleCreate', 'Role@roleCreate')->middleware('webRole:roleCreate');
    Route::get('roleUpdate/{role?}', 'Role@roleUpdate')->middleware('webRole:roleUpdate');
    Route::post('createRolePost', 'Role@createRolePost')->middleware('webRole:roleCreate');
    Route::post('updateRolePost', 'Role@updateRolePost')->middleware('webRole:roleUpdate');
    Route::get('roleDelete/{role?}', 'Role@roleDelete')->middleware('webRole:roleDelete');
    /* 用户curd */
    Route::any('userList', 'User@userList')->middleware('webRole:userList');
});