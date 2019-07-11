<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model {
	protected $_validate = array(
		array('title','require','标题不能为空！',1,'regex',3), // 在新增的时候验证name字段是否为空
		array('cateid','require','分类不能为空！',1,'regex',3), // 在新增的时候验证name字段是否为空
		array('content','require','文章内容不能为空！',1,'regex',3), // 在新增的时候验证name字段是否为空
//		array('pic','require','图片不能为空！',1,'regex',3), // 在新增的时候验证name字段是否为空
	);
}