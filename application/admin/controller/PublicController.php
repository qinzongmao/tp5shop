<?php 
namespace app\admin\controller;
use think\Controller;
use app\admin\model\User;
class PublicController extends Controller{
	public function login(){
		//1.判断post请求
		if(request()->isPost()){
			//2.接收参数
			$postData = input('post.');
			//3.验证器验证器
			$result = $this->validate($postData,"User.login",[],true);
			if($result !== true){
				$this->error( implode(',',$result) );
			}
			//4.判断是否登录成功（把验证逻辑写在模型中）
			$userModel = new User();
			if($userModel->checkUser($postData['username'],$postData['password'])){
				//登录成功，到后台首页去
				$this->redirect("/houtai");
			}else{
				$this->error("用户名或密码失败");
			}
		}
		//get输出模板
		return $this->fetch('');
	}

	public function logout(){
		//清除登录成功保存的session信息
		session('user_id',null);
		session('username',null);
		//重定向到登录页
		$this->redirect("/admin/public/login");
	}
}