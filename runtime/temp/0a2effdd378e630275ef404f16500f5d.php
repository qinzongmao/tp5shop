<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"G:\www.shop.com\public/../application/admin\view\order\index.html";i:1533816093;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="<?php echo config('admin_static'); ?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo config('admin_static'); ?>/css/page.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="/static/plugins/layer/layer.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".click").click(function() {
            $(".tip").fadeIn(200);
        });

        $(".tiptop a").click(function() {
            $(".tip").fadeOut(200);
        });

        $(".sure").click(function() {
            $(".tip").fadeOut(100);
        });

        $(".cancel").click(function() {
            $(".tip").fadeOut(100);
        });

    });
    </script>
</head>

<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">数据表</a></li>
            <li><a href="#">基本内容</a></li>
        </ul>
    </div>
    <div class="rightinfo">
        <div class="tools">
            <ul class="toolbar">
                <li><span><img src="<?php echo config('admin_static'); ?>/images/t01.png" /></span>添加</li>
                <li><span><img src="<?php echo config('admin_static'); ?>/images/t02.png" /></span>修改</li>
                <li><span><img src="<?php echo config('admin_static'); ?>/images/t03.png" /></span>删除</li>
                <li><span><img src="<?php echo config('admin_static'); ?>/images/t04.png" /></span>统计</li>
            </ul>
        </div>
        <table class="tablelist">
            <thead>
                <tr>
                    <th>
                        <input name="" type="checkbox" value="" id="checkAll" />
                    </th>
                    <th>序号</th>
                    <th>订单号</th>
                    <th>订单金额</th>
                    <th>收货地址/收货人/手机号</th>
                    <th>付款状态</th>
                    <th>发货状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                  <?php foreach($orderData as $order): ?>
                <tr>
                    <td>
                        <input name="" type="checkbox" value="" />
                    </td>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['total_price']; ?></td>
                    <td><?php echo $order['address']; ?>/<?php echo $order['receiver']; ?>/<?php echo $order['phone']; ?></td>
                    <td><?php echo config('pay_status')[$order['pay_status']]; ?></td>
                    <td><?php echo config('send_status')[$order['send_status']]; ?></td>
                    <td>
                        <!-- 已付款-未发货 -->
                        <?php if($order['pay_status'] == 1 && $order['send_status'] == 0): ?>
                        <a href="<?php echo url('/admin/order/setWuliu',['order_id'=>$order['order_id']]); ?>" class="tablelink">分配物流</a> 
                        <?php  endif ?>
                        <!-- 查询物流 -->
                        <?php if($order['send_status'] == 1): ?>
                        <a href="javascript:;" company="<?php echo $order['company']; ?>" number="<?php echo $order['number']; ?>" class="getWuliu tablelink">查询物流</a> 
                        <?php  endif ?>

                        <a href="">删除</a>
                    </td>
                </tr>
               <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
        </div>
        <div class="tip">
            <div class="tiptop"><span>提示信息</span>
                <a></a>
            </div>
            <div class="tipinfo">
                <span><img src="<?php echo config('admin_static'); ?>/images/ticon.png" /></span>
                <div class="tipright">
                    <p>是否确认对信息的修改 ？</p>
                    <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
                </div>
            </div>
            <div class="tipbtn">
                <input name="" type="button" class="sure" value="确定" />&nbsp;
                <input name="" type="button" class="cancel" value="取消" />
            </div>
        </div>
    </div>
    <script type="text/javascript">
        //ajax查询物流
        $(".getWuliu").click(function(){
            //获取物流公司和物流运单号
            var company = $(this).attr('company');
            var number = $(this).attr('number');
            $.get("<?php echo url('/admin/order/getWuliu'); ?>",{"company":company,"number":number},function(res){
                    console.log(res); // url
                    //iframe层
                    layer.open({
                      type: 2,
                      title: '物流信息',
                      shadeClose: true,
                      shade: 0.8,
                      area: ['700px', '500px'],
                      content: res //iframe的url
                    });
            },'text');
        });
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</body>
</html>
