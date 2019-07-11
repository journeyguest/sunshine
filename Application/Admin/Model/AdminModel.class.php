<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model {
	protected $_validate = array(
		array('username','require','管理员名不能为空！',1,'regex',3), // 在新增的时候验证name字段是否为空
		array('username','require','管理员名不能重复！',1,'unique',3), // 在新增的时候验证name字段是否唯一
		array('password','require','密码不能为空！',1,'regex',3), // 在新增的时候验证name字段是否为空
		array('username','require','管理员名不能为空！',1,'regex',8), // 在新增的时候验证name字段是否为空
		array('password','require','密码不能为空！',1,'regex',8), // 在新增的时候验证name字段是否为空
		array('verify','check__verify','验证码错误！',1,'callback',8), // 在新增的时候验证name字段是否为空
						//callback方法验证，定义的验证规则是当前模型类的一个方法,详情请看thinkphp3.2.3手册的自动验证内容
	);
	public function login(){
		$password=$this->password;
		$usn=$this->where(array('username'=>$this->username))->find();
		if($usn){
			if($usn['password']==md5($password)){
				session('id',$usn['id']);
				session('username',$usn['username']);
				return ture;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
//	详情请看thinkphp3.2.3手册的验证码内容
	public function check__verify($code,$id=""){
		$verify=new\Think\Verify();
		return $verify->check($code,$id);
	}
}