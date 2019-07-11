<?php
namespace Admin\Model;
use Think\Model;
class LinkModel extends Model {
	protected $_validate = array(
		array('title','require','添加链接不能为空！',1,'regex',3), // 在新增的时候验证name字段是否为空
		array('url','require','添加链接地址不能为空！',1,'regex',3), // 在新增的时候验证name字段是否为空
		array('title','require','添加链接不能重复！',1,'unique',3), // 在新增的时候验证name字段是否唯一
	);
}