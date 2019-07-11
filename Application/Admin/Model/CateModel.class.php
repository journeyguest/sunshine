<?php
namespace Admin\Model;
use Think\Model;
class CateModel extends Model {
	//详情请看thinkphp3.2.3的手册模型查询语言自动验证
	protected $_validate = array(
		array('catename','require','添加分类不能为空！',1,'regex',3), // 在新增的时候验证name字段是否为空
		array('catename','require','添加分类不能重复！',1,'unique',3), // 在新增的时候验证name字段是否唯一
	);
}