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
                        修改管理员
                    @else
                        添加管理员
                    @endif
                </div>
            </div>
            <div class="tpl-block">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form action="{{url('admin/power/user/store')}}" method="post" class="am-form am-form-horizontal">
                            @csrf
                            @if($formType == 'update')
                                <input type="hidden"  name="id" value="{{$admin->id}}">
                            @endif
                            <div class="am-form-group">
                                <label for="admin-name" class="am-u-sm-3 am-form-label">名称</label>
                                <div class="am-u-sm-9">
                                    @if($formType == 'update')
                                        <input type="text" id="admin-name" name="name" value="{{$admin->name}}" placeholder="请输入名称">
                                    @else
                                        <input type="text" id="admin-name" name="name" value="{{old('name')}}" placeholder="请输入名称">
                                    @endif
                                    @if ($errors->has('name'))
                                        <small style="color:red;">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>
                            @if($formType == 'create')
                                <div class="am-form-group">
                                    <label for="admin-loginName" class="am-u-sm-3 am-form-label">登陆账号</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="admin-loginName" name="loginName" value="{{old('loginName')}}" placeholder="请输入登陆账号">
                                        @if ($errors->has('loginName'))
                                            <small style="color:red;">{{$errors->first('loginName')}}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="admin-password" class="am-u-sm-3 am-form-label">密码</label>
                                    <div class="am-u-sm-9">
                                        <input type="password" id="admin-password" name="password" value="{{old('password')}}" placeholder="请输入密码">
                                        @if ($errors->has('password'))
                                            <small style="color:red;">{{$errors->first('password')}}</small>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="am-form-group">
                                <label for="admin-role" class="am-u-sm-3 am-form-label">密码</label>
                                <div class="am-u-sm-9">
                                    <select id="admin-role" name="role">
                                        <option value="">请选择角色</option>
                                        @foreach($role as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('role'))
                                        <small style="color:red;">{{$errors->first('role')}}</small>
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