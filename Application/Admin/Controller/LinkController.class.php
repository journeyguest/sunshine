<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends CommonController {
	//	显示全部分类
    public function lst(){
    	//详情请看thinkphp3.2.3手册的数据分页内容
  		$link=D('link');			//表名为cate，大小写一致。
		$count=$link->count();// 查询满足要求的总记录数
		$Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(3)
		$show= $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $link->order('sort desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板	
    }
	//	增加链接
	 public function add(){
	 	$link=D('link');	//D()用于实例化自定义模型类
	 	//$link = new \Admin\Model\LinkModel();
		if(IS_POST){
			$sun['title']=I('title');	//I()更加方便和安全的获取系统输入变量
			$sun['url']=I('url');
			$sun['desc']=I('desc');
		//			var_dump($link,$link->create());die;
			if($link->create($sun)){
				if($link->add()){
					$this->success('添加链接成功！',U('lst'));
				}else{
					$this->error('添加链接失败');
				}
			}else{
				$this->error($link->getError());
				
			}
			return;
		}
        $this->display();
    }
	 //编辑链接
	  public function edit(){
	  	$link=D('link');

		if(IS_POST){
			$sun['id']=I('id');
			$sun['title']=I('title');	//I()更加方便和安全的获取系统输入变量
			$sun['url']=I('url');
			$sun['desc']=I('desc');
			if($link->create($sun)){
				if($link->save()){
					$this->success('修改链接成功！',U('lst'));
				}else{
					$this->error('修改链接失败');
				}
			}else{
				$this->error($link->getError());
				
			}
			return;
		}
		$linker=$link->find(I('id'));
		$this->assign('linker',$linker);
        $this->display();
    }
	  //删除链接
	   public function del(){
	   		$link=D('link');
			if($link->delete(I('id'))){
				$this->success('删除分类成功',U('lst'));
			}else{
				$this->error('删除分类失败');
			}

    }
	    //链接排序
	   public function sort(){
		  $link=D('link');
		  foreach($_POST as $id=>$sort){
		  	$link->where( array('id'=>$id))->setField('sort',$sort);
		  }	
		  $this->success('排序成功',U('lst'));
    }
}