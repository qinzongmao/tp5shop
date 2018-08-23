<?php 
namespace app\admin\validate;
use think\Validate;
class Auth extends Validate{
	//验证规则
	protected $rule = [
		//表单name名称 => 规则1|规则2...
		'auth_name' => 'require|unique:auth',
		'auth_c' => 'require',
		'auth_a' => 'require'
	];
	//验证不通过的提示信息
	protected $message = [
		//表单name名称.规则名 => '规则提示信息'
		'auth_name.require' => '权限名称必填',
		'auth_name.unique' => '权限名称重复',
		'auth_c.require' => '控制器名必填',
		'auth_a.require' => '方法名必填',
		
	];
	//验证场景
	protected $scene = [
		//场景名=>[元素=>规则1|规则2]
		//场景名=>[元素] 验证元素的所有的规则
		'add' => ['auth_name','auth_c','auth_a'],
		'upd' => ['auth_name','auth_c','auth_a'],
		'onlyAuthName' => ['auth_name']
	];
}