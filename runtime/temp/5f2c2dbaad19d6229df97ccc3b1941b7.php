<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"G:\www.shop.com\public/../application/home\view\public\register.html";i:1533518659;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户注册</title>
	<link rel="stylesheet" href="<?php echo config('home_static'); ?>/style/base.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('home_static'); ?>/style/global.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('home_static'); ?>/style/header.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('home_static'); ?>/style/login.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('home_static'); ?>/style/footer.css" type="text/css">
</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w990 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li>您好，欢迎来到京西！[<a href="login.html">登录</a>] [<a href="register.html">免费注册</a>] </li>
					<li class="line">|</li>
					<li>我的订单</li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->
	
	<div style="clear:both;"></div>

	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="<?php echo config('home_static'); ?>/images/logo.png" alt="京西商城"></a></h2>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<!-- 登录主体部分start -->
	<div class="login w990 bc mt10 regist">
		<div class="login_hd">
			<h2>用户注册</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
				<form action="" method="post">
					<ul>
						<li>
							<label for="">用户名：</label>
							<input type="text" class="txt" name="username" />
							<p>3-20位字符，可由中文、字母、数字和下划线组成</p>
						</li>
						<li>
							<label for="">邮箱：</label>
							<input type="text" class="txt" name="email" />
							<p>3-20位字符，可由字母、数字和下划线组成</p>
						</li>
						<li>
							<label for="">手机号：</label>
							<input type="text" class="txt" name="phone" />
							<input type="button" id="sendSms" value='发送短信'>
						</li>
						<li>
							<label for="">验证码：</label>
							<input type="text" style="  width: 90px;" class="txt" name="phoneCaptcha" />
						</li>
						<li>
							<label for="">密码：</label>
							<input type="password" class="txt" name="password" />
							<p>6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</p>
						</li>
						<li>
							<label for="">确认密码：</label>
							<input type="password" class="txt" name="repassword" />
							<p> <span>请再次输入密码</p>
						</li>
						<li class="checkcode">
							<label for="">验证码：</label>
							<input type="text"  name="captcha" />
							<img src="<?php echo captcha_src(''); ?>" alt="" id="captcha" />
							<span>看不清？<a href="javascript:;" id="changeCaptcha">换一张</a></span>
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="checkbox" class="chb" checked="checked" /> 我已阅读并同意《用户注册协议》
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="submit" value="" class="login_btn" />
						</li>
					</ul>
				</form>

				
			</div>
			
			<div class="mobile fl">
				<h3>手机快速注册</h3>			
				<p>中国大陆手机用户，编辑短信 “<strong>XX</strong>”发送到：</p>
				<p><strong>1069099988</strong></p>
			</div>

		</div>
	</div>
	<!-- 登录主体部分end -->

	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt15">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
			<a href="">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
		</p>
		<p class="auth">
			<a href=""><img src="<?php echo config('home_static'); ?>/images/xin.png" alt="" /></a>
			<a href=""><img src="<?php echo config('home_static'); ?>/images/kexin.jpg" alt="" /></a>
			<a href=""><img src="<?php echo config('home_static'); ?>/images/police.jpg" alt="" /></a>
			<a href=""><img src="<?php echo config('home_static'); ?>/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->
</body>
<script type="text/javascript" src="/static/home/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/static/plugins/layer/layer.js"></script>
<script type="text/javascript">

	var time = 10;
	//实现发送短信倒计时效果
	function countDown(){
		if(time!=0){
			//说明正在倒计时
			$("#sendSms").prop('disabled',true);
			$("#sendSms").val((time--)+'s后重新发送');
		}else{
			//time=0
			$("#sendSms").prop('disabled',false);
			$("#sendSms").val('发送短信');
			time = 10; //重置时间，否则永远等于0
			return false;//退出函数不在往下执行
		}

		//递归调用（递归出口当time==0）
		setTimeout(function(){
			countDown();
		},1000);
	}

	//发送短信
	$("#sendSms").on("click",function(){
		var phone = $("input[name='phone']").val(); //获取手机号
		//判断是否满足手机号正则
		var reg = /^1[3-9]\d{9}$/;
		if(!reg.test(phone)){
			//alert('手机号格式非法');  // 可以使用layer弹出层实现
			//提示层
			layer.msg('手机号格式非法',{"time":2000});
			return false;
		}
		//给按钮倒计时，读秒操作
		countDown();
		//发送ajax请求
		$.get("<?php echo url('home/public/sendSms'); ?>",{"phone":phone},function(res){
			console.log(res);
			if(res.code == 200){
				//alert('发送成功，请查收');
				layer.msg('发送成功，请查收',{"time":2000});
			}else{
				alert(res.message);
			}
		},'json');
	});
	//单击更换验证码
	$("#changeCaptcha").on('click',function(){
		$("#captcha").attr('src',"<?php echo captcha_src(); ?>?_="+Math.random());
	});
	$("#changeCaptcha").click();
</script>
</html>