<?php 
namespace app\admin\validate;
use think\Validate;
class Goods extends Validate{
	//验证规则
	protected $rule = [
		//表单name名称 => 规则1|规则2...
		'goods_name' => 'require|unique:goods',
		//gt正则前面必须先加require规则，否则失效
		'goods_price' => 'require|gt:0',
		//正则验证，前面必须先加require规则，正则已经约束了开头^和结尾$
		'goods_number' => 'require|regex:\d+', // 相当于^\d+$
		'cat_id' => 'require',
	];
	//验证不通过的提示信息
	protected $message = [
		//表单name名称.规则名 => '规则提示信息'
		'goods_name.require' => '商品名称必填',
		'goods_name.unique' => '商品名称重复',
		'goods_price.gt' => '商品价格需大于0',
		'goods_number.require' => '库存必填',
		'goods_number.regex' => '库存需要大于0',
		'cat_id.require' => '请选择商品分类',
		
	];
	//验证场景
	protected $scene = [
		//场景名=>[元素=>规则1|规则2]
		//场景名=>[元素] 验证元素的所有的规则
		'add' => ['goods_name','goods_price','goods_number','cat_id'],
	];
}