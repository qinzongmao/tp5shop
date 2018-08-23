<?php 
namespace app\admin\model;
use think\Model;

class Category extends Model{
	protected $pk = 'cat_id';
	protected $autoWriteTimestamp = true;

	//无限极分类的方法
	public function getSonsCat($data,$pid = 0,$level=1){
		static $result = [];
		foreach($data as $k=>$v){
			if($v['pid'] == $pid){
				//移除已经判断过的元素
				unset($data[$k]);
				$v['level'] = $level;
				//让$v的cat_id作为$result的下标
				$result[ $v['cat_id'] ] = $v;
				//递归调用自己
				$this->getSonsCat($data,$v['cat_id'],$level+1);
			}
			
		}
		//返回递归好的数据
		return $result;
	}
}