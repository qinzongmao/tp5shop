<?php 
namespace app\admin\controller; //定义当前类所在的命名空间
//use think\Controller; 	//引入Controller核心控制器
use app\admin\model\Type;
use app\admin\model\Attribute;
class AttributeController extends CommonController {


    public function upd(){
        if(request()->isPost()){
            $postData = input('post.');
            //手工输入
            if($postData['attr_input_type'] == 0){
                $result = $this->validate($postData,"Attribute.except_attr_values",[],true);
            }else{
                // 列表选择
                $result = $this->validate($postData,"Attribute.add",[],true);
            }
            if($result !== true){
                $this->error( implode(',',$result) );
            }
            //写入数据库
            $attributeModel = new Attribute();
            if($attributeModel->update($postData)){
                $this->success("编辑成功",url("/admin/attribute/index"));
            }else{
                $this->error("编辑失败");
            }
        }
        $attr_id = input('attr_id');
        $attribute = Attribute::find($attr_id);
        //取出商品类型
        $types = Type::select();
        return $this->fetch('',[
            'attribute'=>$attribute,
            'types'=>$types
        ]);
    }

    public function index(){
        //取出所有的属性的属性，分配到模板中
        $attributes = Attribute::alias('t1')
        ->field('t1.*,t2.type_name')
        ->join('sh_type t2','t1.type_id = t2.type_id','left')
        ->select();
        return $this->fetch('',['attributes'=>$attributes]);
    }
    

    public function add(){
    	//判断是否是post请求
    	if(request()->isPost()){
    		//接收post参数
    		$postData = input('post.');
    		//验证器验证
            //如果是属性录入方式为列表选择
            if($postData['attr_input_type'] == 1){
                $result = $this->validate($postData,'Attribute.add',[],true);
            }else{
                //属性录入方式为手工输入
                $result = $this->validate($postData,'Attribute.except_attr_values',[],true);
            }
    		
    		if($result !== true){
    			$this->error(implode(',',$result));
    		}
    		//实例化模型写入数据库
    		$attributeModel = new Attribute();
    		if($attributeModel->allowField(true)->save($postData)){
    			$this->success("添加成功",url("/admin/attribute/index"));
    		}else{
    			$this->error("添加失败");
    		}
    	}
    	//取出商品类型
    	$types = Type::select();
    	return $this->fetch('',['types'=>$types]);
    }

}