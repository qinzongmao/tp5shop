<?php 
namespace app\admin\model;
use think\Model;
class Auth extends Model{
	protected $pk = 'auth_id';
	//时间戳自动写入
	protected $autoWriteTimestamp = true;

	protected static function init(){
		Auth::event('before_update',function($auth){
			//当改为顶级的时候，需要把控制器名和方法名给清空之后在写入数据库
			if($auth['pid'] == 0){
				$auth['auth_c'] = '';
				$auth['auth_a'] = '';
			}
		});
	}

	public function getSonsAuth($data,$pid = 0 , $level = 1){
		static $result = [];
		foreach($data as $k=>$v){
			if($v['pid'] == $pid){
				$v['level'] = $level;
				$result[] = $v;
				//移除已经判断过的元素
				unset($data[$k]);
				//递归调用
				$this->getSonsAuth($data,$v['auth_id'],$level+1);
			}
		}
		//返回递归后的结果
		return $result;
	}

}