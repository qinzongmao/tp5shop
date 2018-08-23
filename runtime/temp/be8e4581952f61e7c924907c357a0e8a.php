<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"G:\www.shop.com\public/../application/admin\view\order\setwuliu.html";i:1533807788;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="<?php echo config('admin_static'); ?>/css/style.css" rel="stylesheet" type="text/css" />
    <script language="JavaScript" src="<?php echo config('admin_static'); ?>/js/jquery.js"></script>
    <style>
        .active{
            border-bottom: solid 3px #66c9f3;
        }
    </style>
</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">表单</a></li>
        </ul>
    </div>
    <div class="formbody">
        <div class="formtitle">
            <span class="active">基本信息</span>
        </div>
        <form action="" method="post">
            <!-- 隐藏域 -->
            <input type="hidden" name="id" value="<?php echo $orderData['id']; ?>">
            <ul class="forminfo">
                <li>
                    <label>订单号</label>
                    <input name="username" value="<?php echo $orderData['order_id']; ?>" disabled="disabled" placeholder="请输入用户名" type="text" class="dfinput" /><i></i>
                </li>
                <li>
                    <label>请设置物流公司</label>
                    <select name="company" class="dfinput">
                        <option value=''>请选择物流公司</option>
                        <option value="yuantong">圆通</option>
                        <option value="shentong">申通</option>
                        <option value="zhongtong">中通</option>
                        <option value="yunda">韵达</option>
                        <option value="shunfeng">顺丰</option>
                    </select>
                </li>
                <li>
                    <label>运单号</label>
                    <input name="number" placeholder="运单号" type="text" class="dfinput" /><i></i>
                </li>
            </ul>
			<li>
                    <label>&nbsp;</label>
                    <input name="" id="btnSubmit" type="submit" class="btn" value="确认保存" />
             </li>
        </form>
    </div>
</body>
<script>
    $(".formtitle span").click(function(event){
        $(this).addClass('active').siblings("span").removeClass('active') ;
        var index = $(this).index();
        $("ul.forminfo").eq(index).show().siblings(".forminfo").hide();
    });
     $(".formtitle span").eq(0).click();
</script>

</html>
