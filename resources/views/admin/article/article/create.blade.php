@extends('admin.layouts.app')

@section('content')
    <style>
        .w-e-menu{
            display: inline-block;
        }
        .w-e-toolbar{
            display: inline-block;
            width: 100%;
        }
    </style>
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
                                <label for="article-name" class="am-u-sm-3 am-form-label">标题</label>
                                <div class="am-u-sm-9">
                                    @if($formType == 'update')
                                        <input type="text" id="article-name" name="title" value="{{$article->title}}" placeholder="请输入标题">
                                    @else
                                        <input type="text" id="article-name" name="title" value="{{old('title')}}" placeholder="请输入标题">
                                    @endif
                                    @if ($errors->has('title'))
                                        <small style="color:red;">{{$errors->first('title')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="article-name" class="am-u-sm-3 am-form-label">简介</label>
                                <div class="am-u-sm-9">
                                    @if($formType == 'update')
                                        <input type="text" id="article-name" name="intro" value="{{$article->intro}}" placeholder="请输入简介">
                                    @else
                                        <input type="text" id="article-name" name="intro" value="{{old('intro')}}" placeholder="请输入简介">
                                    @endif
                                    @if ($errors->has('intro'))
                                        <small style="color:red;">{{$errors->first('intro')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="article-roleId" class="am-u-sm-3 am-form-label">分类</label>
                                <div class="am-u-sm-9">
                                    <select id="article-roleId" name="classId">
                                        <option value="-1">请选择分类</option>
                                        @foreach($articleClass as $key => $value)
                                            @if ($formType == 'update' && $article->classId == $value->id)
                                                <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                            @else
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('classId'))
                                        <small style="color:red;">{{$errors->first('classId')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="article-thumbnail" class="am-u-sm-3 am-form-label">封面图片</label>
                                <div class="am-u-sm-9">
                                    <div class="am-form-group am-form-file">
                                        <div class="tpl-form-file-img" style="width: 100px;">
                                            @if ($article->thumbnail)
                                                <img for-src="article-thumbnail" src="{{$article->thumbnail}}" alt="">
                                            @else
                                                <img for-src="article-thumbnail" src="{{asset('/images/no-images.png')}}" alt="">
                                            @endif
                                        </div>
                                        <button type="button" class="am-btn am-btn-danger am-btn-sm"><i class="am-icon-cloud-upload"></i>添加封面图片</button>
                                        <input id="article-thumbnail" type="file" name="thumbnail" multiple>
                                    </div>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="article-content" class="am-u-sm-3 am-form-label">内容</label>
                                <div class="am-u-sm-9">
                                    <div id="article-content"></div>
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
@section('script')
    <script src="{{asset('/js/wangEditor.min.js')}}"></script>
    <script>
        function getPhoto(node) {
            var imgURL = "";
            try{
                var file = null;
                if(node.files && node.files[0] ){
                    file = node.files[0];
                }else if(node.files && node.files.item(0)) {
                    file = node.files.item(0);
                }
                //Firefox 因安全性问题已无法直接通过input[file].value 获取完整的文件路径
                try{
                    imgURL =  file.getAsDataURL();
                }catch(e){
                    imgRUL = window.URL.createObjectURL(file);
                }
            }catch(e){
                if (node.files && node.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        imgURL = e.target.result;
                    };
                    reader.readAsDataURL(node.files[0]);
                }
            }
            return imgRUL;
        }

        $(function(){
            $("#admin-thumbnail").on('change', function(){
                var imgRUL = getPhoto(this);
                $("img[for-src='"+ $(this).attr('id') +"']").attr('src', imgRUL);
            })
            var E = window.wangEditor
            var editor = new E('#article-content')
            editor.customConfig.uploadImgShowBase64 = true   // 使用 base64 保存图片
            editor.create()
        })
    </script>
@endsection