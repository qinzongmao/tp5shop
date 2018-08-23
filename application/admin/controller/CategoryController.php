<?php 
namespace app\admin\controller; //定义当前类所在的命名空间
//use think\Controller; 	//引入Controller核心控制器
use app\admin\model\Category;
class CategoryController extends CommonController {
	public function upd(){
		//判断是否是post请求
		if(request()->isPost()){
			//接收post参数
			$postData = input('post.');
			//验证器验证
			$result = $this->validate($postData,'Category.upd',[],true);
			if($result !== true){
				$this->error(implode(',',$result));
			}
			//实例化模型写入数据库
			$categoryModel = new Category();
			if($categoryModel->update($postData)){
				$this->success("编辑成功",url("/admin/category/index"));
			}else{
				$this->error("编辑失败");
			}
		}
		//回显数据到表单中
		$cat_id = input('cat_id');
		$categoryModel = new Category();
		$cat = $categoryModel->find($cat_id);
		//取出所有的无限级分类
		$categorys = $categoryModel->getSonsCat( $categoryModel->select() );
		return $this->fetch('',[
			'cat'=>$cat,
			'categorys'=>$categorys
		]);
	}


	public function index(){
		$categoryModel = new Category();
		$cats = $categoryModel->getSonsCat( $categoryModel->select()->toArray() );
		//halt($cats);
		return $this->fetch('',[
			'cats' => $cats
		]);
	}
    
	public function add(){
		//判断是否是post请求
		if(request()->isPost()){
			//接收post参数
			$postData = input('post.');
			//验证器验证
			$result = $this->validate($postData,'Category.add',[],true);
			if($result !== true){
				$this->error(implode(',',$result));
			}
			//实例化模型写入数据库
			$categoryModel = new Category();
			if($categoryModel->allowField(true)->save($postData)){
				$this->success("添加成功",url("/admin/category/index"));
			}else{
				$this->error("添加失败");
			}
		}
		//取出无限极分类的数据
		$categoryModel = new Category();
		$categorys = $categoryModel->getSonsCat( $categoryModel->select() );
		return $this->fetch('',[
			'categorys' => $categorys
		]);
	}


}