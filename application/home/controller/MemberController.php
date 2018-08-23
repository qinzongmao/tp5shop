<?php 
namespace app\home\controller; //定义当前类所在的命名空间
use think\Controller; 	//引入Controller核心控制器
use app\home\model\Member;
class MemberController extends Controller {
    
	public function qqLogin(){
		//调用qq登录的库文件，出现一个qq扫码框
		require_once("../extend/qqLogin/qqConnectAPI.php");
		//实例化一个全局类和系统内置类，需要加反斜杠/
		$qc = new \QC();
		$qc->qq_login();

	}

	public function qqCallback(){
		require_once("../extend/qqLogin/qqConnectAPI.php");
		$qc = new \QC();
		$token = $qc->qq_callback();
		$openid = $qc->get_openid();

		$userInfo = Member::where('openid','=',$openid)->find();
		if($userInfo){
			//说明之前使用qq登录过,获取用户信息存储到session中，用于回显
			session("member_username",$userInfo['username']?$userInfo['username']:$userInfo['nickname']);
			session("member_id",$userInfo['member_id']);
			$this->redirect("/");
		}else{
			//说明第一次使用qq进行登录
			$qc = new \QC($token,$openid);
			$qqUserInfo = $qc->get_user_info();
			//把用户的openid和用户昵称写入数据库
			$data = [
				'nickname' => $qqUserInfo['nickname'],
				'openid' => $openid
			];
			//通过模型名静态调用create(),成功返回入库后的数据对象
			$result = Member::create($data);
			if($result){
				//写入成功（第一次登录是没有usename的值，所以，把nickname写入session即可）
				session("member_username",$result['nickname']);
				session("member_id",$result['member_id']);
				$this->redirect("/");
			}else{
				$this->error("qq登录失败");
			}
		}


		/*echo "token:".$token;
		echo "<hr />";
		echo "openid:".$openid; //一个qq对于一个网站openid是唯一性的
		echo "<hr />";
		//重写实例化qc对象
		$qc = new \QC($token,$openid );
		$qqUserInfo = $qc->get_user_info();
		dump( $qqUserInfo );*/
	}

}