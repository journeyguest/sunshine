<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>个人后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/sunshine/Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/sunshine/Application/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="http://localhost/sunshine/Application/Admin/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="http://localhost/sunshine/Application/Admin/Public/ueditor/ueditor.config.js"></script>		<!--引入外部编辑器文件-->
	<script type="text/javascript" src="http://localhost/sunshine/Application/Admin/Public/ueditor/ueditor.all.min.js"></script>	<!--引入外部编辑器文件-->
	<script type="text/javascript" src="http://localhost/sunshine/Application/Admin/Public/ueditor/lang/zh-cn/zh-cn.js"></script>	<!--引入外部编辑器文件-->

   
    
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
</div><!--包含菜单模版menu-->
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/sunshine/index.php/Admin/Article/lst">文章管理</a><span class="crumb-step">&gt;</span><span>新增文章</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                	<!--enctype="multipart/form-data"解决上传文件传值问题，所有的值 都是以二进制进行传递的-->
                    <table class="insert-tab" width="100%">
                            <tr>
                                <th><i class="require-red">*</i>文章标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text">
                                </td>
                            </tr>
                             <tr>
                                <th><i class="require-red">*</i>文章描述：</th>
                                <td>
                                    <textarea style="width:420px;height: 100px;"name="desc"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>图片：</th>
                                <td>
                                    <input id="pic" name="pic" size="50" value="" type="file">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>文章类型：</th>
                                <td>
                                   <select name="cateid">
                                   	<option>选择分类</option>
                                   	<?php if(is_array($cateres)): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                   </select>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>文章内容：</th>
                                <td>
                                    <textarea name="content" id="content"></textarea><!--引入外部编辑器-->
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>

<script type="text/javascript">
	//实例化编辑器
	//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
	UE.getEditor('content',{initialFrameWidth:1000,initialFrameHeight:200,});
</script>
</body>
</html>