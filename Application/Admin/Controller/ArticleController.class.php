<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
	//	显示全部分类
    public function lst(){
  		$article=D('ArticleView');			//表名为cate，大小写一致。
		$count=$article->count();// 查询满足要求的总记录数
		$Page= new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(3)
		$show= $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $article->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板	
    }
	 
	//	增加文章
	 public function add(){
	 	$article=D('article');	//D()用于实例化自定义模型类
	 	//$article = new \Admin\Model\articleModel();
	 	
		if(IS_POST){
			$sun['title']=I('title');	//I()更加方便和安全的获取系统输入变量
			$sun['content']=I('content');
			$sun['desc']=I('desc');
			$sun['cateid']=I('cateid');
			$sun['time']=time();
			//详情请看thinkphp3.2.3手册文件上传内容
			//pic文件和临时文件不等于空
			if($_FILES['pic']['tmp_name']!=''){
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize = 3145728 ;// 设置附件上传大小
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath = './'; // 设置附件上传根目录
				$upload->savePath = './Public/Uploads/'; // 设置附件上传（子）目录
				// 上传单个文件
				$info = $upload->uploadOne($_FILES['pic']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else{
				// 上传成功 获取上传文件信息
				$sun['pic']=$info['savepath'].$info['savename'];
				}	
			}else{
				
			}
		//			var_dump($article,$article->create());die;
			if($article->create()){
				if($article->add($sun)){
					$this->success('添加文章成功！',U('lst'));
				}else{
					$this->error('添加文章失败');
				}
			}else{
				$this->error($article->getError());
				
			}
			return;
		}
		//从数据库查询数据，然后把查询到数据传给模板的文章类型
		$cateres=D('cate')->select();
		$this->assign('cateres',$cateres);
        $this->display();
    }
	 //编辑文章
	  public function edit(){
	  	$article=D('article');

		if(IS_POST){
			$sun['title']=I('title');	//I()更加方便和安全的获取系统输入变量
			$sun['content']=I('content');
			$sun['desc']=I('desc');
			$sun['cateid']=I('cateid');
			$sun['time']=I('time');
			if($_FILES['pic']['tmp_name']!=''){
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize = 3145728 ;// 设置附件上传大小
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath = './'; // 设置附件上传根目录
				$upload->savePath = './Public/Uploads/'; // 设置附件上传（子）目录
				// 上传单个文件
				$info = $upload->uploadOne($_FILES['pic']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else{
				// 上传成功 获取上传文件信息
				$sun['pic']=$info['savepath'].$info['savename'];
				}	
			}else{
				
			}
		//			var_dump($article,$article->create());die;
			if($article->create()){
				if($article->add($sun)){
					$this->success('修改文章成功！',U('lst'));
				}else{
					$this->error('修改文章失败');
				}
			}else{
				$this->error($article->getError());
				
			}
			return;
		}
		$articleer=$article->find(I('id'));
		$this->assign('articleer',$articleer);
		$cateres=D('cate')->select();
		$this->assign('cateres',$cateres);
        $this->display();
    }
	  //删除文章
	   public function del(){
	   		$article=D('article');
			if($article->delete(I('id'))){
				$this->success('删除分类成功',U('lst'));
			}else{
				$this->error('删除分类失败');
			}

    }	 
}