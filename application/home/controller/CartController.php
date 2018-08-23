<?php 
namespace app\home\controller; //定义当前类所在的命名空间
use think\Controller; 	//引入Controller核心控制器
use think\Db;
class CartController extends Controller {


    public function updateCartGood(){
        if(request()->isAjax()){
            //判断是否登录
            if(!session('member_id')){
                $response = ['code'=>-1,'message'=>'登录过期，请重新登录'];
                echo json_encode($response);die;
            }
            //1.接收参数
            $goods_id = input('goods_id');
            $goods_number = input('goods_number');
            $goods_attr_ids = input('goods_attr_ids');
            //2.调用购物车方法进行更新，同步到数据库
            $cart = new \cart\Cart();
            $result = $cart->changeCartNum($goods_id,$goods_attr_ids,$goods_number);
            //3.判断是否成功，返回json数据
            if($result){
                $response = ['code'=>200,'message'=>'success'];
                echo json_encode($response);die;
            }else{
                $response = ['code'=>-2,'message'=>'fail'];
                echo json_encode($response);die;
            }

        }
    }


    //删除购物车商品
    public function delCartGood(){
        if(request()->isAjax()){
            //1.接收参数
            $goods_id = input('goods_id');
            $goods_attr_ids = input('goods_attr_ids');
            //2.通过购物车的delCart方法删除商品
            $cart = new \cart\Cart();
            //3.判断是否删除成功，返回json数据
            if( $cart->delCart($goods_id,$goods_attr_ids) ){
                $response = ['code'=>200,'message'=>'删除成功'];
                echo json_encode($response);die;
            }else{
                $response = ['code'=>-1,'message'=>'删除失败'];
                echo json_encode($response);die;
            }
        }

    }
    
    //添加商品到购物车
    public function addGoodsToCart(){
    	if(request()->isAjax()){
    		//1.判断是否登录
    		$member_id = session("member_id");
    		if(!$member_id){
    			$response = ['code'=>-1,'message'=>'请先登录后操作'];
    			echo json_encode($response);die;
    		}
    		//2.接收参数
    		$goods_id = input('goods_id');
    		$goods_number = input('goods_number');
    		$goods_attr_ids = input('goods_attr_ids');
    		//3.调用购物车方法进行商品的入库
    		$cart = new \cart\Cart();
    		$result = $cart->addCart($goods_id,$goods_attr_ids,$goods_number);
    		if($result){
    			$response = ['code'=>200,'message'=>'加入购物车成功'];
    			echo json_encode($response);die;
    		}else{
    			$response = ['code'=>-2,'message'=>'加入购物车失败，稍后重试'];
    			echo json_encode($response);die;
    		}
    	}
    }

    //购物车列表
    public function cartList(){
        $member_id = session('member_id');
        if(!$member_id){
            $this->error("请先登录，在操作");
        }
        //1.通过购物车类的getCart方法获取购物车的数据
        $cart = new \cart\Cart();
        $carts = $cart->getCart();
        //2.构造一定的数组结构
        $cartData = [];
        foreach($carts as $key => $goods_number){
            $arr = explode('-',$key);
            $goods_id = $arr[0];
            $goods_attr_ids = $arr[1];
            $data=[
                'goods_id' => $goods_id ,
                'goods_attr_ids' => $goods_attr_ids ,
                'goods_number' => $goods_number ,
                'goodsInfo' => Db::name('goods')->find($goods_id),
                'attr'=> Db::name('goods_attr')
                        ->field("group_concat(t2.attr_name,':',t1.attr_value separator '<br />') attrInfo,sum(t1.attr_price) attrTotalPrice")
                        ->alias('t1')
                        ->join('sh_attribute t2','t1.attr_id = t2.attr_id','left')
                        ->where("t1.goods_attr_id",'in',$goods_attr_ids)
                        ->find()
             ];

             $cartData[] = $data;
        }
        return $this->fetch('',['cartData'=>$cartData]);
    }

    //清空购物车商品
    public function clearCartGood(){
        if(request()->isAjax()){
            //调用购物车的方法clearCart清空购物车
            $cart = new \cart\Cart();
            if($cart->clearCart()){
                $response = ['code'=>200,'message'=>'删除成功'];
                echo json_encode($response);die;
            }else{
                 $response = ['code'=>200,'message'=>'删除失败'];
                echo json_encode($response);die;
            }
        }
    }


    //展示订单阶段页面
    public function orderAccount(){
        //判断是否登录
        if(!session('member_id')){
            $this->error("请重新登录");
        }
        //判断否完成是否有数据
        $cart = new \cart\Cart();
        if(! $cart->getCart()){
            $this->error("购物车没有数据",url('/'));
        }
        //取出购物车的数据
        $cartData = $this->getCartGood();
        return $this->fetch('',[
            'cartData' =>$cartData
        ]);
    }

    //获取购物车详细的商品数据
    public function getCartGood(){
        //1.通过购物车类的getCart方法获取购物车的数据
        $cart = new \cart\Cart();
        $carts = $cart->getCart();
        //2.构造一定的数组结构
        $cartData = [];
        foreach($carts as $key => $goods_number){
            $arr = explode('-',$key);
            $goods_id = $arr[0];
            $goods_attr_ids = $arr[1];
            $data=[
                'goods_id' => $goods_id ,
                'goods_attr_ids' => $goods_attr_ids ,
                'goods_number' => $goods_number ,
                'goodsInfo' => Db::name('goods')->find($goods_id),
                'attr'=> Db::name('goods_attr')
                        ->field("group_concat(t2.attr_name,':',t1.attr_value separator '<br />') attrInfo,sum(t1.attr_price) attrTotalPrice")
                        ->alias('t1')
                        ->join('sh_attribute t2','t1.attr_id = t2.attr_id','left')
                        ->where("t1.goods_attr_id",'in',$goods_attr_ids)
                        ->find()
             ];
             $cartData[] = $data;
        }
        return $cartData;
    }



}