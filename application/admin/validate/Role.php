<?php 
namespace app\admin\validate;
use think\Validate;
class Role extends Validate{
	//验证规则
	protected $rule = [
		//表单name名称 => 规则1|规则2...
		'role_name' => 'require|unique:role',
		
	];
	//验证不通过的提示信息
	protected $message = [
		//表单name名称.规则名 => '规则提示信息'
		'role_name.require' => '权限名称必填',
		'role_name.unique' => '权限名称重复',
		
	];
	//验证场景
	protected $scene = [
		//场景名=>[元素=>规则1|规则2]
		//场景名=>[元素] 验证元素的所有的规则
		'add' => ['role_name'],
		'upd' => ['role_name']
	];
}