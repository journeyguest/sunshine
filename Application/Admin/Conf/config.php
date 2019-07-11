<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' =>array(
	'__PUBLIC__' => SITE_URL.'/Application/Admin/Public', // 更改默认的/Public 替换规则，详细请看thinkphp手册的模板替换内容
								//__PUBLIC__：会被替换成当前网站的公共目录 通常是 /Public，现改此规则
								//SITE_URL是在index.php文件里面定义应用目录的参数
)
);