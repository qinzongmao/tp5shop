<?php 
namespace app\admin\validate;
use think\Validate;
class User extends Validate{
	//验证规则
	protected $rule = [
		//表单name名称 => 规则1|规则2...
		'username' => 'require|unique:user',
		'password' => 'require|min:5',
		'repassword' => 'require|confirm:password',
		'role_id' => 'require',
	];
	//验证不通过的提示信息
	protected $message = [
		//表单name名称.规则名 => '规则提示信息'
		'username.require' => '用户名必填',
		'username.unique' => '用户名重复',
		'password.require' => '密码必填',
		'repassword.require' => '重复密码必填',
		'password.min' => '密码必须大于5位',
		'repassword.confirm' => '两次密码不一致',
		'role_id' => '请设置角色'
	];
	//验证场景
	protected $scene = [
		//场景名=>[元素=>规则1|规则2]
		//场景名=>[元素] 验证元素的所有的规则
		'add' => ['username','password','repassword','role_id'],
		'onlyUsername' => ['username'],
		'UsernamePassword' => ['username','password','repassword'],
		'login' => ['username'=>"require",'password'],
	];
}