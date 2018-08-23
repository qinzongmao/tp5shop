<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
/*
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];*/

use think\Route;
//前台首页路由
Route::get('/','home/index/index');
//后台首页路由
Route::get('houtai','admin/index/index');

Route::get('home/index/test','home/index/test');

//前台分组路由
Route::group("home",function(){
    //个人订单付款路由
    Route::any('order/payMoney','home/order/payMoney');
    //展示个人订单路由
    Route::any('order/selforder','home/order/selforder');
    //支付成功的页面展示
    Route::any('order/orderdone','home/order/orderdone');
    //支付宝同步通知路由
    Route::any('order/returnurl','home/order/returnurl');
    //支付宝异步通知路由
    Route::any('order/notifyurl','home/order/notifyurl');
    //订单入库进行付款的路由
    Route::any('order/orderpay','home/order/orderpay');
    //展示订单结算页面的路由
    Route::any('cart/orderAccount','home/cart/orderAccount');
    //更新购物车商品数量的路由
    Route::any('cart/updateCartGood','home/cart/updateCartGood');
    //清空购物车商品的路由
    Route::any('cart/clearCartGood','home/cart/clearCartGood');
    //删除购物车商品的路由
    Route::any('cart/delCartGood','home/cart/delCartGood');
    //购物车列表路由
    Route::any('cart/cartlist','home/cart/cartlist');
    //加入商品到购物车的路由
    Route::any('cart/addgoodstocart','home/cart/addgoodstocart');
    //商品详情页的路由
    Route::any('goods/detail','home/goods/detail');
    //分类列表页的路由
    Route::any('category/index','home/category/index');
    //qq登录成功后的回调路由
    Route::any('member/qqcallback','home/member/qqcallback');
    //qq登录的路由
    Route::any('member/qqlogin','home/member/qqlogin');
    //重置新密码的路由
    Route::any('public/setnewpassword/:member_id/:hash/:time','home/public/setnewpassword');
    //发送邮件的路由
    Route::get('public/sendemail','home/public/sendemail');
    //忘记密码的路由
    Route::get('public/forgetpassword','home/public/forgetpassword');
    //发送短信的路由
    Route::any('public/sendsms','home/public/sendsms');
    //退出路由
    Route::any('public/logout','home/public/logout');
    //注册路由
    Route::any('public/register','home/public/register');
    //登录路由
    Route::any('public/login','home/public/login');
});


//后台admin分组路由
Route::group('admin',function(){


     /***************************后台订单管理路由***********************************/
     //查询物流的路由
    Route::any('order/getwuliu','admin/order/getwuliu');
    //订单列表
    Route::get('order/index','admin/order/index');
     //订单分配物流
    Route::any('order/setwuliu','admin/order/setwuliu');

    /***************************后台商品管理路由***********************************/
    //权限列表
    Route::get('goods/index','admin/goods/index');
    //编辑权限
    Route::any('goods/upd','admin/goods/upd');
    //添加权限
    Route::any('goods/add','admin/goods/add');
    //删除权限
    Route::get('goods/del','admin/goods/del');
    //ajax获取商品类型的属性路由
    Route::get('goods/getTypeAttr','admin/goods/getTypeAttr');

    /***************************后台属性管理路由***********************************/
    //权限列表
    Route::get('category/index','admin/category/index');
    //编辑权限
    Route::any('category/upd','admin/category/upd');
    //添加权限
    Route::any('category/add','admin/category/add');
    //删除权限
    Route::get('category/del','admin/category/del');



     /***************************后台属性管理路由***********************************/
    //权限列表
    Route::get('attribute/index','admin/attribute/index');
    //编辑权限
    Route::any('attribute/upd','admin/attribute/upd');
    //添加权限
    Route::any('attribute/add','admin/attribute/add');
    //删除权限
    Route::get('attribute/del','admin/attribute/del');



    /***************************后台商品类型管理路由***********************************/
    //查看商品类型的属性列表
    Route::get('type/getattr','admin/type/getattr');
    //权限列表
    Route::get('type/index','admin/type/index');
    //编辑类型
    Route::any('type/upd','admin/type/upd');
    //添加类型
    Route::any('type/add','admin/type/add');
    //删除类型
    Route::get('type/del','admin/type/del');

     /***************************后台角色管理路由***********************************/
    //权限列表
    Route::get('role/index','admin/role/index');
    //编辑权限
    Route::any('role/upd','admin/role/upd');
    //添加权限
    Route::any('role/add','admin/role/add');





    /***************************后台权限管理路由***********************************/
    //权限列表
    Route::get('auth/index','admin/auth/index');
    //编辑权限
    Route::any('auth/upd','admin/auth/upd');
    //添加权限
    Route::any('auth/add','admin/auth/add');

    /***************************后台用户管理路由***********************************/
    //编辑用户
    Route::any('user/upd','admin/user/upd');
    //用户删除路由
    Route::get('user/del','admin/user/del');
    //用户列表路由
    Route::get('user/index','admin/user/index');
    //添加用户
    Route::any('user/add','admin/user/add');
	//后台首页路由
	Route::get('index/left','admin/index/left');
	Route::get('index/top','admin/index/top');
	Route::get('index/main','admin/index/main');
    /**********************登录和退出的路由***************************************/
    //登录的路由
    Route::any('public/login','admin/public/login');
    //退出的路由
    Route::any('public/logout','admin/public/logout');
});


Route::get('/test/test','admin/index/test');


