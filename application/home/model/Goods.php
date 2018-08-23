<?php 
namespace app\home\model;
use think\Model;

class Goods extends Model{
	protected $pk = 'goods_id';


	public function getGoods($type,$limit){
		//定义初始的查询条件
		$where = [
			'is_sale' => 1
		];
		switch($type){
			case 'is_crazy':
				//按照价格升序取出来
				$data = $this->where($where)->order('goods_price asc')->limit($limit)->select();
				break;
			default :
				$where[$type] = ['=',1];
				$data = $this->where($where)->limit($limit)->select();
				break;
		}
		//返回商品数据
		return $data;
	}


	//商品加入浏览历史cookie中
	public function addGoodsToHistory($goods_id){
		//由于加入商品goods_id之前，cookie可能已经有数据了，要先判断下取出来
		$history = cookie('history')?cookie('history'):[]; //[3,4]
		if($history){
			//说明浏览历史已经有数据
			//1.把商品id加入$history头部
			array_unshift($history,$goods_id);
			//2.$history去除重复的商品
			$history = array_unique($history);
			//3.判断$history是否超过指定的长度
			if(count( $history ) > 5){
				//移除数组$history最后一个元素
				array_pop($history);
			}
		}else{
			//说明浏览历史没有数据，直接把当前访问的商品goods_id存进去就行
			$history[] = $goods_id;
		}
		//把浏览历史重新写入cookie
		//tp5中cookie存数组默认底层已经帮助我们序列化（serialize）存储，取出来的时候，会自动帮我们反序列化（unserialize）
		//存储一个星期 3600*24*7
		cookie('history',$history,3600*24*7);
		//返回给调用者
		return $history;
	}
}