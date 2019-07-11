<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>个人博客后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/sunshine/Application/Admin/Public/css/common.css"/>	<!--后台配置文件的参数，传递URL地址-->
    <link rel="stylesheet" type="text/css" href="http://localhost/sunshine/Application/Admin/Public/css/main.css"/>			<!--http://localhost/sunshine/Application/Admin/Public：会被替换成当前网站的公共目录 通常是 /Public-->
    <script type="text/javascript" src="http://localhost/sunshine/Application/Admin/Public/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="#">首页</a></li>
                <li><a href="http://localhost/sunshine/index.php/Admin" >管理员首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员：<?php echo $_SESSION['username'];?></a></li>
                <li><a href="/sunshine/index.php/Admin/Admin/edit/id/<?php echo $_SESSION['username'];?>">修改密码</a></li>
                <li><a href="/sunshine/index.php/Admin/Admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div> <!--包含头部模版header-->
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/sunshine/index.php/Admin/Article/lst"><i class="icon-font">&#xe008;</i>文章管理</a></li>
                        <li><a href="/sunshine/index.php/Admin/Cate/lst"><i class="icon-font">&#xe006;</i>分类管理</a></li>		<!--/sunshine/index.php/Admin：会替换成当前模块的URL地址 （不含域名）-->
                        <li><a href="/sunshine/index.php/Admin/Link/lst"><i class="icon-font">&#xe012;</i>友情链接</a></li>			<!--详情请看thinkphp3.2.3手册模板替换内容-->
                        <li><a href="/sunshine/index.php/Admin/Admin/lst"><i class="icon-font">&#xe052;</i>管理员管理</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div><!--包含菜单模版menu--><!--详情请看thinkphp3.2.3手册的包含文件内容-->
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span style="color: blue">sunshine个人博客</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    <a href="#"><i class="icon-font">&#xe001;</i>新增作品</a>
                    <a href="#"><i class="icon-font">&#xe005;</i>新增博文</a>
                    <a href="#"><i class="icon-font">&#xe048;</i>新增文章类型</a>
                    <a href="#"><i class="icon-font">&#xe041;</i>新增博客分类</a>
                    <a href="#"><i class="icon-font">&#xe01e;</i>作品评论</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info">Windows7.0</span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info">Apache/2.2.21 (Win64) PHP/5.3.10</span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info">WampServer</span>
                    </li>
                    <li>
                        <label class="res-lab">最新版本：</label><span class="res-info">version1.0.0</span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info">2M</span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info">2019年4月1日 9：00</span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名/IP</label><span class="res-info">localhost [ 127.0.0.1 ]</span>
                    </li>
                    <li>
                        <label class="res-lab">Host</label><span class="res-info">127.0.0.1</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>使用帮助</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">sunshine个人邮箱：</label><span class="res-info">1121758401@qq.com</span>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>