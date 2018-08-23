<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"G:\www.shop.com\public/../application/home\view\cart\cartlist.html";i:1533781275;s:56:"G:\www.shop.com\application\home\view\public\header.html";i:1533804571;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>购物车页面</title>
	<link rel="stylesheet" href="<?php echo config('home_static'); ?>/style/base.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('home_static'); ?>/style/global.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('home_static'); ?>/style/header.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('home_static'); ?>/style/cart.css" type="text/css">
	<link rel="stylesheet" href="<?php echo config('home_static'); ?>/style/footer.css" type="text/css">

	<script type="text/javascript" src="<?php echo config('home_static'); ?>/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="<?php echo config('home_static'); ?>/js/cart1.js?v=1"></script>
	
</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w1210 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li>您好，欢迎来到京西！
						<?php if(session('member_id')): ?>
							<a href="javascript:;" style="color:red;"><?php echo session('member_username'); ?></a>
							[<a href="<?php echo url('/home/public/logout'); ?>">退出</a>] 
						<?php  else:?>
							[<a href="<?php echo url('/home/public/login'); ?>">登录</a>] 
							[<a href="<?php echo url('/home/public/register'); ?>">免费注册</a>] 
					    <?php  endif;?>
					</li>
					<li class="line">|</li>
					<li><a href="<?php echo url('/home/order/selfOrder'); ?>">我的订单</a></li>
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
			<div class="flow fr">
				<ul>
					<li class="cur">1.我的购物车</li>
					<li>2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<div style="clear:both;"></div>

	<!-- 主体部分 start -->
	<div class="mycart w990 mt10 bc">
		<h2><span>我的购物车</span></h2>
		<table>
			<thead>
				<tr>
					<th class="col1">商品名称</th>
					<th class="col2">商品信息</th>
					<th class="col3">单价</th>
					<th class="col4">数量</th>	
					<th class="col5">小计</th>
					<th class="col6">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php $totalPrice = 0;  foreach($cartData as $v): ?>
				<tr>
					<td class="col1"><a href=""><img src="/static/upload/<?php echo json_decode($v['goodsInfo']['goods_middle'])[0]; ?>" alt="" /></a>  <strong><a href=""><?php echo $v['goodsInfo']['goods_name']; ?></a></strong></td>
					<td class="col2"> <?php echo $v['attr']['attrInfo'] ?></td>
					<?php  $danjian = $v['goodsInfo']['goods_price']+$v['attr']['attrTotalPrice'] ?>
					<td class="col3">￥<span><?php echo $danjian; ?></span></td>
					<td class="col4" goods_id="<?php echo $v['goods_id']; ?>" goods_attr_ids="<?php echo $v['goods_attr_ids']; ?>"> 
						<!-- [-] -->
						<a href="javascript:;"  class="reduce_num"></a>
						<input type="text" name="amount" value="<?php echo $v['goods_number']; ?>" class="amount"/>
						<!-- [+] -->
						<a href="javascript:;"  class="add_num"></a>
					</td>
					<?php 

					$xiaoji = $danjian*$v['goods_number'] ; 
					$totalPrice +=$xiaoji;
					?>
					<td class="col5">￥<span><?php echo $xiaoji; ?></span></td>
					<td class="col6">
						<a href="javascript:;" 
						xiaoji="<?php echo $xiaoji; ?>" goods_attr_ids="<?php echo $v['goods_attr_ids']; ?>" 
						goods_id="<?php echo $v['goods_id']; ?>" class="delCartGood">删除</a></td> 
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="6">购物金额总计： <strong>￥ <span id="total"><?php echo $totalPrice; ?></span></strong></td>
				</tr>
			</tfoot>
		</table>
		<div class="cart_btn w990 bc mt10">
			<a href="" class="continue">继续购物</a>
			<a href="javascript:;" class="continue" style="margin-left:10px" id="clearCartGood">清空购物车</a>
			<a href="<?php echo url('/home/cart/orderAccount'); ?>" class="checkout">结 算</a>
		</div>
	</div>
	<!-- 主体部分 end -->

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
<script type="text/javascript">
	//ajax清空购物车商品
	$("#clearCartGood").on('click',function(){
		if(!confirm('确认清空?')){
			return false;
		}

		//发送ajax清空购物车
		$.get("<?php echo url('/home/cart/clearCartGood'); ?>",'',function(res){
			console.log(res);
			if(res.code == 200){
				//清空tbody中的内容，并且给对应的提示
				$("tbody").html("<h3>购物空空如也</h3><br/><a href='/'>去首页逛逛</a>");
			}
		},'json');
	});


	//ajax删除购物车商品
	$(".delCartGood").on('click',function(){
		var _self = $(this);
		//获取商品id和属性id
		var goods_id = _self.attr('goods_id');
		var goods_attr_ids = _self.attr('goods_attr_ids');
		if(!confirm('确认删除?') ){
			return false;
		}
		//发送ajax请求，进行删除
		var param = {"goods_id":goods_id,"goods_attr_ids":goods_attr_ids};
		$.get("<?php echo url('/home/cart/delCartGood'); ?>",param,function(res){
			console.log(res);
			if(res.code == 200){
				//获取小计，在删除当前的tr行（parseFloat把数字字符转化为浮点型）
				var xiaoji = parseFloat( _self.attr('xiaoji') );  
				var total = parseFloat( $("#total").html() );
				//回显减去后的总价
				$("#total").html(total-xiaoji);
				_self.parents('tr').remove();
			}else{
				alert(res.message);
			}
		},'json')
	});
</script>
</html>
