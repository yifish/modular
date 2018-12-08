<!doctype html>
<html>
<head>
    @include('blog.public.head')
</head>

<body id="blog">
<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        <img width="200" src="http://s.amazeui.org/media/i/brand/amazeui-b.png" alt="Amaze UI Logo"/>
        <h2 class="am-hide-sm-only">中国首个开源 HTML5 跨屏前端框架</h2>
    </div>
</header>
<hr>
{{--@include('blog.public.nav')--}}

@include('blog.public.banner')

<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('/assets/js/amazeui.min.js')}}"></script>
<!-- <script src="assets/js/app.js"></script> -->
</body>
</html>