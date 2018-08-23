<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"G:\www.shop.com\public/../application/home\view\public\forgetpassword.html";i:1533518871;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>找回密码</title>
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
	
	<!-- 找回密码主体部分start -->
	<div class="login w990 bc mt10 regist">
		<div class="login_hd">
			<h2>找回密码</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
			<form action="" method="post">
					<ul>
						<li>
							<label for="">邮箱：</label>
							<input type="text" class="txt" name="email" />
							<p>请输入注册时候的邮箱地址</p>
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="button" value="发送邮件" id='sendEmail' class="login_btns" />
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
	//发送ajax请求，找回密码
	$("#sendEmail").on('click',function(){
		//获取到邮箱
		var email = $("input[name='email']").val();
		//邮箱的正则
		//常见邮箱 523542345@qq.com@...   5gsdfgs@163.com  gsfgsf@itcast.cn  
		//()把括号匹配到的内容叫做分组，也叫捕获，会把匹配到的内容放到正则缓冲区中，供其他地方反向引用
		//(?:),叫非捕获组，不会把括号内的内容放在缓冲区中，其他地方就不能反向引用，从而提高性能。
		var reg = /^\w+@(?:\w+\.)+[a-zA-Z]{2,5}$/;  
		if(!reg.test(email)){
			//alert('邮箱不合法');
			layer.msg('邮箱不合法',{"time":2000});
			return false;
		}
		//发送ajax请求，发送邮件
		$.get("<?php echo url('/home/public/sendEmail'); ?>",{"email":email},function(res){
			console.log(res);
			if(res.code == '200'){
				//alert('发送邮件成功，请查收');
				layer.msg('发送邮件成功，请查收',{"time":2000});
			}else{
				layer.msg('发送邮件失败',{"time":2000});
			}
		},'json');
	});
</script>
</html>