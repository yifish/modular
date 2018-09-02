<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\Admin','prefix'=> 'admin'], function ($api) {
        $api->post('login', 'Login@login');
        $api->get('info', 'Admin@info')->middleware('adminToken');
        $api->get('competence', 'Admin@competenceList')->middleware('adminToken');
    });
});
