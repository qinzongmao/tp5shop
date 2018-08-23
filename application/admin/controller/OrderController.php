<?php 
namespace app\admin\controller; //定义当前类所在的命名空间
//use think\Controller; 	//引入Controller核心控制器
use think\Db;
class OrderController extends CommonController {
  	
  	public function index(){
  		$orderData = Db::name('order')->select();
  	  	return $this->fetch('',['orderData'=>$orderData]);
  	}  



  	public function setWuliu(){
  		if(request()->isPost()){
  			$postData = input('post.');
        $postData['update_time'] = time();
  			$postData['send_status'] = 1; //改为已发货
  			//验证（自行验证）
  			//编辑写入数据库
  			if(Db::name('order')->update($postData)){
  				$this->success("配置物流成功",url("/admin/order/index"));
  			}else{
  				$this->error("配置物流失败");
  			}
  		}
  		$order_id = input('order_id');
  		$orderData = Db::name('order')->where('order_id',$order_id)->find();
  		return $this->fetch('',['orderData'=>$orderData]);
  	}


    public function getWuliu(){
      if(request()->isAjax()){
        $company = input('company');
        $number = input('number');
        $url = "http://www.kuaidi100.com/applyurl?key=9d37bc6b0a41e6fe&com={$company}&nu={$number}&show=0";
        echo   file_get_contents($url); //此接口返回url地址 前台作为iframe的src属性即可
      }
    }

}