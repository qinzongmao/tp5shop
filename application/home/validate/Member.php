<?php 
namespace app\home\validate;
use think\Validate;
class Member extends Validate{
	//验证规则
	protected $rule = [
		//表单name名称 => 规则1|规则2...
		'username' => 'require|unique:member',
		'email' => 'require|email|unique:member',
		'password' => 'require',
		'repassword' => 'require|confirm:password',
		// captcha_src() captcha  | captcha_src('2') captcha:2
		'captcha' => 'require|captcha',
		//captcha_src('2') captcha:2 验证验证码标识为2的验证码
		'login_captcha' => 'require|captcha:2',
		'phone' => 'require|unique:member',
	];
	//验证不通过的提示信息
	protected $message = [
		//表单name名称.规则名 => '规则提示信息'
		'username.require' => '用户名必填',
		'username.unique' => '用户名占用',
		'email.require' => '邮箱必填',
		'email.email' => '邮箱格式非法',
		'email.unique' => '邮箱占用',
		'password.require' => '密码必填',
		'repassword.confirm' => '两次密码不一致',
		'captcha.require' => '验证码必填',
		'captcha.captcha' => '验证码有误',
		'login_captcha.require' => '验证码必填',
		'login_captcha.captcha' => '验证码错误',
		
	];
	//验证场景
	protected $scene = [
		//场景名=>[元素=>规则1|规则2]
		//场景名=>[元素] 验证元素的所有的规则
		'register' => ['username','email','password','repassword','phone'],
		'login' => ['username'=>'require','password','login_captcha'],
		'sendSms' => ['phone'=>'require|unique:member'],
		'setNewPassword' => ['password','repassword']
	];
}
