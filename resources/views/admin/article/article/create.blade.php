@extends('admin.layouts.app')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">

        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            {{--<li><a href="#">分类</a></li>--}}
            <li class="am-active">内容</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span>
                    @if($formType == 'update')
                        修改文章
                    @else
                        添加文章
                    @endif
                </div>
            </div>
            <div class="tpl-block">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form action="{{url('admin/'. $formType .'ArticlePost')}}" method="post" class="am-form am-form-horizontal">
                            @if ($errors->has('errors'))
                                <small style="color:red;">{{$errors->first('errors')}}</small>
                            @endif
                            @csrf
                            @if($formType == 'update')
                                <input type="hidden"  name="id" value="{{$article->id}}">
                            @endif
                            <div class="am-form-group">
                                <label for="admin-name" class="am-u-sm-3 am-form-label">标题</label>
                                <div class="am-u-sm-9">
                                    @if($formType == 'update')
                                        <input type="text" id="admin-name" name="title" value="{{$article->title}}" placeholder="请输入标题">
                                    @else
                                        <input type="text" id="admin-name" name="title" value="{{old('title')}}" placeholder="请输入标题">
                                    @endif
                                    @if ($errors->has('name'))
                                        <small style="color:red;">{{$errors->first('title')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="admin-name" class="am-u-sm-3 am-form-label">简介</label>
                                <div class="am-u-sm-9">
                                    @if($formType == 'update')
                                        <input type="text" id="admin-name" name="intro" value="{{$article->intro}}" placeholder="请输入简介">
                                    @else
                                        <input type="text" id="admin-name" name="intro" value="{{old('intro')}}" placeholder="请输入简介">
                                    @endif
                                    @if ($errors->has('name'))
                                        <small style="color:red;">{{$errors->first('intro')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="tpl-alert"></div>
        </div>

@endsection