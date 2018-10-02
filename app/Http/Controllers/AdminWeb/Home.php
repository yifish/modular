<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 1:45
 */

namespace App\Http\Controllers\AdminWeb;

class Home
{
    public function index()
    {
        $system = array();
        return view('admin.home',compact('system'));
    }
}