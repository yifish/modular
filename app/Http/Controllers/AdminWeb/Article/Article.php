<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/8
 * Time: 22:34
 */

namespace App\Http\Controllers\AdminWeb\Article;

use App\Http\Controllers\AdminWeb\AdminWebController;
use Illuminate\Http\Request;
use App\MyModel\article\articleClass;

class Article extends AdminWebController
{
    private $articleClass;

    public function __construct()
    {
        parent::__construct();

        $this->articleClass = new articleClass();
    }

    /*
     * 文章分类列表页面
     * */
    public function articleClassList()
    {
        $articleClass = new articleClass();
        $list = $articleClass->orderBy('created_at', 'desc')->paginate($this->limit);
        return view('admin.article.class.list', compact('list'));
    }
    public function articleCCreate()
    {
        $formType = $this->formType;
        $articleClass = $this->articleClass;
        return view('admin.article.class.create', compact('articleClass', 'formType'));
    }
    public function articleCUpdate(articleClass $articleClass)
    {
        $this->formType = 'update';
        $this->articleClass = $articleClass;
        return $this->articleCCreate();
    }
    public function createArticleCPost(Request $request)
    {
        $this->myValidator('name', $request);
        $this->articleCSaveStore($request);
        if ($this->articleClass->save()) {
            return redirect('admin/articleClassList');
        }
        throw new WebException(['errors' => trans('admin.error_create')]);
    }
    public function updateArticleCPost(Request $request)
    {
        $this->myValidator(['id', 'name'], $request);
        $this->articleClass = articleClass::find($request->id);
        $this->articleCSaveStore($request);
        if ($this->articleClass->save()) {
            return redirect('admin/articleClassList');
        }
        throw new WebException(['errors' => trans('admin.error_update')]);
    }
    public function articleCDelete(articleClass $articleClass)
    {
        $articleClass->forceDelete();
        return redirect('admin/articleClassList');
    }
    public function articleCSaveStore($request)
    {
        $this->articleClass->name = $request->name;
    }
}