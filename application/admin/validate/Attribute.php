<?php 
namespace app\admin\validate;
use think\Validate;
class Attribute extends Validate{
	//验证规则
	protected $rule = [
		//表单name名称 => 规则1|规则2...
		'attr_name' => 'require|unique:attribute',
		'type_id' => 'require',
		'attr_values' => 'require'
	];
	//验证不通过的提示信息
	protected $message = [
		//表单name名称.规则名 => '规则提示信息'
		'attr_name.require' => '属性名必填',
		'attr_name.unique' => '属性名重复',
		'type_id.require' => '请选择商品类型',
		'attr_values.require' => '列表选择需要输入属性值',
		
	];
	//验证场景
	protected $scene = [
		//场景名=>[元素=>规则1|规则2]
		//场景名=>[元素] 验证元素的所有的规则
		'except_attr_values' => ['attr_name','type_id'],
		'add' => ['attr_name','type_id','attr_values'],
	];
}