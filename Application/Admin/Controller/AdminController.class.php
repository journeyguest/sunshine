<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {
	//	显示全部管理员
    public function lst(){
		$admin=D('Admin');			//表名为cate，大小写一致。
		$count=$admin->count();// 查询满足要求的总记录数
		$Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(3)
		$show= $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $admin->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板		
    }
	//	增加管理员
	 public function add(){
	 	$admin=D('admin');	//D()用于实例化自定义模型类
		if(IS_POST){
			$sun['username']=I('username');	//I()更加方便和安全的获取系统输入变量
			$sun['password']=md5(I('password'));
			if($admin->create($sun)){
				if($admin->add()){
					$this->success('添加管理员成功！',U('lst'));
				}else{
					$this->error('添加管理员失败');
				}
				
			}else{
				$this->error($admin->getError());
				
			}
			return;
		}
        $this->display();
    }
	 //编辑管理员
	  public function edit(){
	  	$admin=D('admin');
		if(IS_POST){
			$sun['id']=I('id');
			$sun['username']=I('username');	//I()更加方便和安全的获取系统输入变量
			$admins=$admin->find($sun['id']);
			$password=$admins['password'];
			if(I('password')){
				$sun['password']=md5(I('password'));
			}else{
				$sun['password']=$password;
			}
			if($admin->create($sun)){		//通过create方法或者赋值的方式生成数据对象，然后写入数据库
				if($admin->save()){
					$this->success('修改管理员成功！',U('lst'));
				}else{
					$this->error('修改管理员失败');
				}
			}else{
				$this->error($admin->getError());	
			}
			return;
		}
		$adminr=$admin->find(I('id'));
		$this->assign('adminr',$adminr);
        $this->display();
    }
	  //删除管理员
	   public function del(){
	   		$admin=D('admin');
			$id=I('id');
			if($id==1){
				$this->error('该管理员不能删除');
			}else{
				if($admin->delete(I('id'))){
					$this->success('删除管理员成功',U('lst'));
				}else{
					$this->error('删除管理员失败');
				}
			}
    }
	   public function logout(){
	   		session(null);//删除name;
	   		$this->success('退出成功',U('Login/index'));
	   }
	   
}