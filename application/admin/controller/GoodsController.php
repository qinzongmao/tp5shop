<?php 
namespace app\admin\controller; //定义当前类所在的命名空间
//use think\Controller;     //引入Controller核心控制器
use app\admin\model\Category;
use app\admin\model\Goods;
use app\admin\model\Type;
use app\admin\model\Attribute;
class GoodsController extends CommonController {

    public function index(){
        $goods = Goods::alias('t1')
        ->field('t1.*,t2.cat_name')
        ->join("sh_category t2","t1.cat_id = t2.cat_id",'left')
        ->select();
        return $this->fetch('',['goods'=>$goods]);
    }


    public function getTypeAttr(){
        if(request()->isAjax()){
            $type_id = input('type_id');
            //取出属性表中对应类型的数据，返回json格式
            $attributes = Attribute::where('type_id','=',$type_id)->select();
            echo json_encode( $attributes );die;  // return json($attributes);die;
        }
    }
    
    public function add(){
        //判断是否是post请求
        if(request()->isPost()){
            //打印商品的属性和商品的属性价格
            //接收post参数
            $postData = input('post.');
            //验证器验证
            $result = $this->validate($postData,'Goods.add',[],true);
            if($result !== true){
                $this->error(implode(',',$result));
            }
            $goodsModel = new Goods();
            //开始上传文件
            $goods_img = $goodsModel->uploadImg(); // [20180714/gsdfg.jpg,20180714/gsdfg.jpg] []
            if($goods_img){
                //说明有原图上传成功过，对他进行缩略图处理
                $thumb = $goodsModel->thumb($goods_img); //['goods_middle'=>'路径','goods_thumb'=>'路径']
                //把路径写入数据库(存json格式)
                $postData['goods_img'] = json_encode($goods_img);
                $postData['goods_middle'] = json_encode($thumb['goods_middle']);
                $postData['goods_thumb'] = json_encode($thumb['goods_thumb']);
            }
            //实例化模型写入数据库
            
            if($goodsModel->allowField(true)->save($postData)){
                $this->success("添加成功",url("/admin/goods/index"));
            }else{
                $this->error("添加失败");
            }
        }
        //取出所有的无限级分类的数据
        $categoryModel = new Category();
        $categorys = $categoryModel->getSonsCat( $categoryModel->select() );
        //取出商品的类型
        $types = Type::select();
        return $this->fetch('',['categorys'=>$categorys,'types'=>$types]);
    }

}
