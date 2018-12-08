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
use App\MyModel\article\articleModel;
use App\MyCommon\Upload;

class Article extends AdminWebController
{
    private $articleClass;

    private $article;

    public function __construct()
    {
        parent::__construct();

        $this->articleClass = new articleClass();

        $this->article = new articleModel();
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
    /*
     * 文章列表页面
     * */
    public function articleList()
    {
        $articleModel = new articleModel();
        $list = $articleModel->orderBy('created_at', 'desc')->paginate($this->limit);
        return view('admin.article.article.list', compact('list'));
    }
    /*
     * 文章创建页
     * */
    public function articleCreate()
    {
        $article = $this->article;
        $formType = $this->formType;
        $articleClass = articleClass::all();
        return view('admin.article.article.create', compact('articleClass', 'article', 'formType'));
    }
    /*
     * 文章修改页
     * */
    public function articleUpdate(articleModel $article)
    {
        $this->formType = 'update';
        $this->article = $article;
        return $this->articleCreate();
    }
    /*
     * 文章创建方法
     * */
    public function createArticlePost(Request $request)
    {
        $this->myValidator('articleCreate', $request);
        $this->saveStore($request);
        $this->article->types = 1;
        $this->article->publisherId = session('admin.id');
        $this->article->publisherName = session('admin.name');
        if ($this->article->save()) {
            return redirect('admin/articleList');
        }
        throw new WebException(['errors' => trans('admin.error_create')]);
    }
    /*
     * 文章修改方法
     * */
    public function updateArticlePost(Request $request)
    {
        $this->myValidator(['id', 'articleUpdate'], $request);
        $this->article = articleModel::find($request->id);
        $this->saveStore($request);
        if ($this->article->save()) {
            return redirect('admin/articleList');
        }
        throw new WebException(['errors' => trans('admin.error_update')]);
    }
    /*
     * 删除方法
     * */
    public function articleDelete(articleModel $article)
    {
        $article->forceDelete();
        return redirect('admin/articleList');
    }
    /*
     * 修改方法
     * */
    public function saveStore(Request $request)
    {
        if ($request->input('intro')) {
            $this->article->intro = $request->intro;
        }
        if ($request->input('title')) {
            $this->article->title = $request->title;
        }
        if ($request->input('contents')) {
            $this->article->content = $request->contents;
        }
        if ($request->input('status')) {
            $this->article->status = $request->status;
        }
        if ($request->input('give')) {
            $this->article->give = $request->give;
        }
        if ($request->input('releaseTime')) {
            $this->article->releaseTime = $request->releaseTime;
        }
        if ($request->input('classId')) {
            $this->article->classId = $request->classId;
        }
        if ($request->file('thumbnail') || $request->input('thumbnail')){
            $upload = new Upload();
            $this->article-> thumbnail = $upload->uploadFile($request, 'thumbnail');
        }
    }
}