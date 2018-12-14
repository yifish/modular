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
use App\MyModel\spread\banner as bannerModel;

class Banner extends AdminWebController
{
    private $banner;

    protected $types = array(
        array('enName' => 'blog', 'name' => '博客', 'value' => 1)
    );

    public function __construct()
    {
        $this->banner = new bannerModel();
    }

    /*
     * 轮播图页
     * */
    public function bannerList()
    {
        $bannerModel = new bannerModel();
        $list = $bannerModel->orderBy('created_at', 'desc')->paginate($this->limit);
        return view('admin.spread.banner.list', compact('list'));
    }
    /*
     * 轮播图创建页
     * */
    public function create()
    {
        $formType = $this->formType;
        $banner = $this->banner;
        $types = $this->types;
        return view('admin.spread.banner.create', compact('types','banner', 'formType'));
    }

}
