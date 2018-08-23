<?php 
namespace app\home\validate;
use think\Validate;

class Order extends Validate{
	//验证规则
	protected $rule = [
		//表单name名称 => 规则1|规则2...
		'receiver' => 'require',
		'address' => 'require',
		'phone' => 'require',
		'zcode' => 'require',
	];
	//验证不通过的提示信息
	protected $message = [
		//表单name名称.规则名 => '规则提示信息'
		'receiver.require' => '收货人必填',
		'address.require' => '地址必填',
		'phone.require' => '手机号必填',
		'zcode.require' => '邮编必填',
	];
	//验证场景
	protected $scene = [
		//场景名=>[元素=>规则1|规则2]
		//场景名=>[元素] 验证元素的所有的规则
		'pay' => ['receiver','address','phone','zcode']
		
	];
}
