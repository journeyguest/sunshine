<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class ArticleViewModel extends ViewModel {
	//详情请看thinkphp3.2.3的视图模型内容
	public $viewFields = array(
		'Article'=>array('id','title','pic','_type'=>'LEFT'),
		'Cate'=>array('catename','_on'=>'Article.cateid=Cate.id'),
	);
}