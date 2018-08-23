<?php 
namespace app\admin\validate;
use think\Validate;
class Category extends Validate{
	//验证规则
	protected $rule = [
		//表单name名称 => 规则1|规则2...
		'cat_name' => 'require|unique:category',
		'pid' => 'require',
	];
	//验证不通过的提示信息
	protected $message = [
		//表单name名称.规则名 => '规则提示信息'
		'cat_name.require' => '分类名称必填',
		'cat_name.unique' => '分类名称重复',
		'pid.require' => '请选择父分类',
		
	];
	//验证场景
	protected $scene = [
		//场景名=>[元素=>规则1|规则2]
		//场景名=>[元素] 验证元素的所有的规则
		'add' => ['cat_name','pid'],
		'upd' => ['cat_name','pid']
	];
}