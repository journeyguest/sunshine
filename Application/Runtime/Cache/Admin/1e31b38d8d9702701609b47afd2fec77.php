<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>个人后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/sunshine/Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/sunshine/Application/Admin/Public/css/main.css"/>
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
                <li><a href="#">管理员：<?php echo $_SESSION['usename'];?></a></li>
                <li><a href="__Module__/Admin/edit/id/<?php echo $_SESSION['usename'];?>">修改密码</a></li>
                <li><a href="__Module__/Admin/logout">退出</a></li>
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
    </div><!--包含菜单模版menu-->
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">分类管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" action="/sunshine/index.php/Admin/Cate/sort" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/sunshine/index.php/Admin/Cate/add"><i class="icon-font"></i>新增分类</a>		<!--__CONTROOLLER__ 当前目录（tp框架的常用方法）(调用控制器中的方法)-->
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>
                        	<input class="btn btn-primary btn2" type="submit" value="更新排序" />
                        </a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>分类名称</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($cateres)): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="id[]" value="" type="checkbox"></td>
                            <td> 
                                <input class="common-input sort-input" name="<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["sort"]); ?>" type="text">
                            </td>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td title=""><a target="_blank" href="#" title=""><?php echo ($vo["catename"]); ?></a>                         
                            <td>
                                <a class="link-update" href="/sunshine/index.php/Admin/Cate/edit/id/<?php echo ($vo["id"]); ?>">修改</a>
                                <a class="link-del" onclick="return confirm('确定删除吗？');" href="/sunshine/index.php/Admin/Cate/del/id/<?php echo ($vo["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>