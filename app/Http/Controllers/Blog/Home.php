<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/7
 * Time: 21:20
 */

namespace App\Http\Controllers\Blog;

class Home extends WebController
{
    /*
     * 博客首页
     * */
    public function home()
    {
        return view('web.blog.index');
    }
}