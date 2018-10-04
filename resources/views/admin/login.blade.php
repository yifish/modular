<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="{{asset('/assets/i/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('/assets/i/app-icon72x72@2x.png')}}">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="{{asset('/assets/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/assets/css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/app.css')}}">
</head>

<body data-type="login">

<div class="am-g myapp-login">
    <div class="myapp-login-logo-block  tpl-login-max">
        <div class="myapp-login-logo-text">
            <div class="myapp-login-logo-text">
                Amaze UI<span> Login</span> <i class="am-icon-skyatlas"></i>

            </div>
        </div>

        <div class="login-font">
            <i>Log In </i> or <span> Sign Up</span>
        </div>
        <div class="am-u-sm-10 login-am-center">
            <form class="am-form" method="post" action="{{url('admin/login/loginPost')}}">
                <fieldset>
                    @csrf
                    @if($errors->has('message'))
                        <small style="color:red;">{{$errors->first('message')}}</small>
                    @endif
                    @if($errors->has('loginName'))
                        <small style="color:red;">{{$errors->first('loginName')}}</small>
                    @endif
                    <div class="am-form-group">
                        <input type="text" value="{{old('loginName')}}" name="loginName" class="" placeholder="输入登录账号">
                    </div>
                    @if($errors->has('password'))
                        <small style="color:red;">{{$errors->first('password')}}</small>
                    @endif
                    <div class="am-form-group">
                        <input type="password" value="{{old('password')}}" name="password" class="" placeholder="设置个密码吧">
                    </div>
                    <p><button type="submit" class="am-btn am-btn-default">登录</button></p>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('/assets/js/amazeui.min.js')}}"></script>
<script src="{{asset('/assets/js/app.js')}}"></script>
</body>

</html>