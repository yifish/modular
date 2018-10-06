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
                        修改角色
                    @else
                        添加角色
                    @endif
                </div>
            </div>
            <div class="tpl-block">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form action="{{url('admin/'. $formType .'RolePost')}}" method="post" class="am-form am-form-horizontal">
                            @if ($errors->has('errors'))
                                <small style="color:red;">{{$errors->first('errors')}}</small>
                            @endif
                            @csrf
                            @if($formType == 'update')
                                <input type="hidden"  name="id" value="{{$role->id}}">
                            @endif
                            <div class="am-form-group">
                                <label for="admin-name" class="am-u-sm-3 am-form-label">名称</label>
                                <div class="am-u-sm-9">
                                    @if($formType == 'update')
                                        <input type="text" id="admin-name" name="name" value="{{$role->name}}" placeholder="请输入名称">
                                    @else
                                        <input type="text" id="admin-name" name="name" value="{{old('name')}}" placeholder="请输入名称">
                                    @endif
                                    @if ($errors->has('name'))
                                        <small style="color:red;">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-competence" class="am-u-sm-3 am-form-label">权限</label>
                                <div class="am-u-sm-9">
                                    @foreach ($competence as $key => $value)
                                        <div>
                                            <div class="tpl-switch">
                                                <label class="am-checkbox am-secondary" style="padding: 0 0 0 20px;">
                                                    @if($formType == 'update')
                                                        <input id="{{ $key }}Checkbox" type="checkbox" name="competence[]" value="{{ $key }}" @if ($role->isCompetence($key)) data-am-ucheck checked @else data-am-ucheck @endif>
                                                    @else
                                                        <input id="{{ $key }}Checkbox" type="checkbox" name="competence[]" value="{{ $key }}" data-am-ucheck>
                                                    @endif
                                                    <span>{{ $value['name'] }}</span>
                                                </label>
                                            </div>
                                            <div style="margin-left: 20px;">
                                                @foreach ($value['competence'] as $k => $v)
                                                <div class="tpl-switch" style="width: 130px;float:left;">
                                                    <label class="am-checkbox am-secondary" style="padding: 0 0 0 20px;">
                                                        @if($formType == 'update')
                                                            <input type="checkbox" for="{{ $key }}Checkbox" name="competence[]" value="{{ $k }}" @if ($role->isCompetence($k)) data-am-ucheck checked @else data-am-ucheck @endif>
                                                        @else
                                                            <input type="checkbox" for="{{ $key }}Checkbox" name="competence[]" value="{{ $k }}" data-am-ucheck>
                                                        @endif
                                                        <span>{{ $v }}</span>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
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