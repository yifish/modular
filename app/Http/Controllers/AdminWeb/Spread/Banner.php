<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 16:45
 */

namespace App\Http\Controllers\AdminWeb\Spread;

use App\Http\Controllers\AdminWeb\AdminWebController;
use Illuminate\Http\Request;

class Banner extends AdminWebController
{
    private $banner;

    public function __construct()
    {

    }

    /*
     * 轮播图页
     * */
    public function bannerList()
    {
        echo 1;
    }
}
