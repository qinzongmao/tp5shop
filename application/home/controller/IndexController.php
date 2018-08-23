<?php 
namespace app\home\controller; //定义当前类所在的命名空间
use think\Controller; 	//引入Controller核心控制器
use app\home\model\Category;
use app\home\model\Goods;
class IndexController extends Controller {
	public function test(){
		dump($_SERVER);die;
		//实例化购物车类
		$cart = new \cart\Cart();
		halt($cart);
		//dump( sendSms('15811112222',array('1111','5'),'1') );
		//$to = ['1259481020@qq.com','wangwei2@itcast.cn'];
		///dump( sendEmail($to,'11111','22222222222222222222222222222') );
	}
    
	public function index(){

		//取出导航栏的分类数据（is_show=1）
		$categoryModel =  new Category();
		$navDatas = $categoryModel->getNavData(5);
		//取出首页的三级分类筛选的数据
		$oldCat = Category::select();
		//两个技巧
		//1、以每个分类的cat_id主键作为cats二维数组的下标
		$cats = [];
		foreach($oldCat as $cat){
			$cats[ $cat['cat_id'] ] = $cat;
		}
		//2、根据pid进行分组
		$children = [];
		foreach($oldCat as $cat){
			$children[ $cat['pid'] ][] = $cat['cat_id'];
		}
		//取出前台推荐位的商品
		$goodsModel = new Goods();
		$crazyDatas = $goodsModel->getGoods('is_crazy',5);
		$hotDatas = $goodsModel->getGoods('is_hot',5);
		$bestDatas = $goodsModel->getGoods('is_best',5);
		$newDatas = $goodsModel->getGoods('is_new',5);

		return $this->fetch('',[
			'navDatas'=>$navDatas,
			'cats'=>$cats,
			'children'=>$children,
			'crazyDatas'=>$crazyDatas,
			'hotDatas'=>$hotDatas,
			'bestDatas'=>$bestDatas,
			'newDatas'=>$newDatas
		]);
	}

}