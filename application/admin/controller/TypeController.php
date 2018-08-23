<?php 
namespace app\admin\controller; //定义当前类所在的命名空间
//use think\Controller; 	//引入Controller核心控制器
use app\admin\model\Type;
use app\admin\model\Attribute;
class TypeController extends CommonController {

	//获取商品类型下面的属性
	public function getAttr(){
		$type_id = input('type_id');
		//只获取type_name的字段值
		$type_name = Type::where("type_id",'=',$type_id )->value('type_name');
		$attributes = Attribute::where('type_id','=',$type_id)->select();
		return $this->fetch('',['attributes'=>$attributes,'type_name'=>$type_name]);

	}

	public function del(){
		$type_id = input('type_id');
		if(Type::destroy($type_id)){
			$this->success("删除成功",url("/admin/type/index"));
		}else{
			$this->error("删除失败");
		}
	}


	public function upd(){
		//判断是否是post请求
		if(request()->isPost()){
			//接收post参数
			$postData = input('post.');
			//验证器验证
			$result = $this->validate($postData,'Type.upd',[],true);
			if($result !== true){
				$this->error(implode(',',$result));
			}
			//实例化模型写入数据库
			$addModel = new Type();
			if($addModel->update($postData)){
				$this->success("编辑成功",url("/admin/type/index"));
			}else{
				$this->error("编辑失败");
			}
		}
		$type_id = input('type_id');
		$type = Type::find($type_id);
		return $this->fetch('',['type'=>$type]);
	}
    
    public function add(){
    	//判断是否是post请求
    	if(request()->isPost()){
    		//接收post参数
    		$postData = input('post.');
    		//验证器验证
    		$result = $this->validate($postData,'Type.add',[],true);
    		if($result !== true){
    			$this->error(implode(',',$result));
    		}
    		//实例化模型写入数据库
    		$typeModel = new Type();
    		if($typeModel->allowField(true)->save($postData)){
    			$this->success("添加成功",url("/admin/type/index"));
    		}else{
    			$this->error("添加失败");
    		}
    	}
    	return $this->fetch('');
    }

    public function index(){
    	$types = Type::select();
    	return $this->fetch('',['types'=>$types]);
    }

}