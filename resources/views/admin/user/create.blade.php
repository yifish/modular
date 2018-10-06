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
                        修改用户
                    @else
                        添加用户
                    @endif
                </div>
            </div>
            <div class="tpl-block">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-9">
                        <form action="{{url('admin/'. $formType .'UserPost')}}" method="post" class="am-form am-form-horizontal">
                            @if ($errors->has('errors'))
                                <small style="color:red;">{{$errors->first('errors')}}</small>
                            @endif
                            @csrf
                            @if($formType == 'update')
                                <input type="hidden"  name="id" value="{{$user->id}}">
                            @endif
                            <div class="am-form-group">
                                <label for="admin-name" class="am-u-sm-3 am-form-label">名称</label>
                                <div class="am-u-sm-9">
                                    @if($formType == 'update')
                                        <input type="text" id="admin-name" name="name" value="{{$user->name}}" placeholder="请输入名称">
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
                                    <label for="user-loginName" class="am-u-sm-3 am-form-label">登录账号</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-loginName" name="loginName" value="{{old('loginName')}}" placeholder="请输入登录账号">
                                        @if ($errors->has('loginName'))
                                            <small style="color:red;">{{$errors->first('loginName')}}</small>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="am-form-group">
                                <label for="user-password" class="am-u-sm-3 am-form-label">登录密码</label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="user-password" name="password" value="{{old('password')}}" placeholder="请输入登录密码">
                                    @if ($errors->has('password'))
                                        <small style="color:red;">{{$errors->first('password')}}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">手机号</label>
                                <div class="am-u-sm-9">
                                    @if($formType == 'update')
                                        <input type="text" id="user-phone" name="phone" value="{{$user->phone}}" placeholder="请输入手机号">
                                    @else
                                        <input type="text" id="user-phone" name="phone" value="{{old('phone')}}" placeholder="请输入手机号">
                                    @endif
                                    @if ($errors->has('phone'))
                                        <small style="color:red;">{{$errors->first('phone')}}</small>
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