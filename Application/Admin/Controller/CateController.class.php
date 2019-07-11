<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends CommonController {
	//	显示全部分类
    public function lst(){
  		$cate=D('cate');			//表名为cate，大小写一致。
		$cateres=$cate->order('sort asc')->select();	//查询此表的所有数据。order()以id大小来升(asc)降(desc)序
		$this->assign('cateres',$cateres);	//输出变量的值到模板，详情请看thinkphp3.2.3手册的模板赋值内容
        $this->display();
		
    }
	//	增加分类
	 public function add(){
	 	$cate=D('cate');	//D()用于实例化自定义模型类
		if(IS_POST){		//IS_POST 当前是否POST请求
			$sun['catename']=I('catename');	//I()更加方便和安全的获取系统输入变量
			if($cate->create($sun)){
				if($cate->add()){			//add()thinkphp框架方法
					$this->success('添加分类成功！',U('lst'));//U()跳转方法，详情请看thinphp3.2.3手册的重定向内容
				}else{
					$this->error('添加分类失败');
				}
				
			}else{
				$this->error($cate->getError());
				
			}
			return;
		}
        $this->display();
    }
	 //编辑分类
	  public function edit(){
	  	$cate=D('cate');
		$cater=$cate->find(I('id'));//详情请看thinkphp3.2.3手册的数据读取内容。
		$this->assign('cater',$cater);
		if(IS_POST){
			$sun['id']=I('id');
			$sun['catename']=I('catename');	//I()更加方便和安全的获取系统输入变量
			if($cate->create($sun)){
				if($cate->save()){
					$this->success('修改分类成功！',U('lst'));
				}else{
					$this->error('修改分类失败');
				}
			}else{
				$this->error($cate->getError());
				
			}
			return;
		}
        $this->display();
    }
	  //删除分类
	   public function del(){
	   		$cate=D('cate');
			if($cate->delete(I('id'))){
				$this->success('删除分类成功',U('lst'));
			}else{
				$this->error('删除分类失败');
			}

    }
	    //分类排序
	   public function sort(){
		  $cate=D('cate');
		  foreach($_POST as $id=>$sort){
		  	$cate->where( array('id'=>$id))->setField('sort',$sort);//setField更新字段，详情请看thinkphp3.2.3手册更新字段内容
		  }	
		  $this->success('排序成功',U('lst'));
    }
}