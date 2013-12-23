<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="__STATICS__/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="__STATICS__/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__STATICS__/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="__STATICS__/css/com_loginstyle.css" />
<link rel="stylesheet" type="text/css" href="__STATICS__/css/com_style.css" />
<title><?php echo ($Title); ?> | 易监理 - 装修行业中代表良心的力量，家装监理，连锁店装修监理，别墅装修监理，别墅监理，上海家装监理公司，家装监理公司，上海装修监理公司，家装监理，装潢监理，上海家装监理，上海装潢监理，上海装饰监理，上海装修监理，上海家庭装潢监理，装修监理，上海装修监理，验房，上海验房，家装监理师，装饰监理师，别墅监理，别墅装饰监理，家装工程监理，家庭装修监理，水电监理，家装监理费，家装施工监理，装修第三方监理</title>
<meta name="keywords" content="易监理,上海家装监理公司,家装监理公司,上海装修监理公司,家装监理,装潢监理,上海家装监理,上海装潢监理,上海装饰监理,上海装修监理,上海家庭装潢监理,装修监理,上海装修监理,验房,上海验房,家装监理师,装饰监理师,别墅监理,别墅装饰监理,家装工程监理,家庭装修监理,水电监理,家装监理费,家装施工监理,装修第三方监理"/>
<meta name="description" content="易监理，上海家装监理公司，家装监理公司，上海装修监理公司，家装监理，装潢监理，上海家装监理，上海装潢监理，上海装饰监理，上海装修监理，上海家庭装潢监理，装修监理，上海装修监理，验房，上海验房，家装监理师，装饰监理师，别墅监理，别墅装饰监理，家装工程监理，家庭装修监理，水电监理，家装监理费，家装施工监理，装修第三方监理"/>
</head>

<script type="text/javascript" src="__STATICS__/js/day.js"></script>
<body>
 <div class="header">
      <div class="head">
        <div class="logo">
          <img src="__STATICS__/css/com_img/logo.png" width="158" height="40" />
          <h2>易设计管理系统</h2>
          <span>&lt;&lt;&nbsp;<a href="<?php echo U('Index/index');?>">返回首页</a></span>
        </div>
        
        <div class="headmenu">
          欢迎您：<span id="userName"><?php echo ($user["account"]); ?></span>
          <a  id="logoutLink" href="<?php echo U('User/logout');?>">退出</a>
          <a href="">修改密码</a>
          <a href="">使用帮助</a>
          <a href="">网站公告</a>
        </div>
        <div class="both"></div>
      </div>
    </div>
    
    <div class="content">
      <div class="left">
        <div class="booking b">
          <h3>预约</h3>
          <ul>
            <li><a href="<?php echo U('Reserve/index');?>">预约单管理</a></li>
            <li><a href="<?php echo U('Pay/index');?>">预约款查询</a></li>
          </ul>
        </div>
        
        <div class="storesettings b">
          <h3>公司信息管理</h3>
          <ul>
            <li><a href="<?php echo U('Company/edit');?>">基本资料</a></li>
            <?php if($isCompany == 1): ?><li><a href="<?php echo U('Designer/index');?>">设计师管理</a></li><?php endif; ?>
            <li><a href="<?php echo U('Case/index');?>">案例管理</a></li>
            <li><a href="<?php echo U('Score/index');?>">评分管理</a></li>
            <li><a href="<?php echo U('House/index');?>">样板房管理</a></li>
          </ul>
        </div>
        
        <div class="promotions l">
          <h3>促销活动</h3>
          <ul>
            <li><a href="<?php echo U('Active/index');?>">活动管理</a></li>
            <li><a href="<?php echo U('Active/add');?>">发布活动</a></li>
          </ul>
        </div>
      </div>
      <div class="right">
        <div class="frame hide" id="menu2">
          <h2>预付款查询</h2>
          <div class="">
            <h3>预付款概况</h3>
            <div class="b">
              <span><b>当前余额：<em><?php echo ($m); ?></em>元</b></span><br /><br />
            </div>
            <br /><br />
            <h3>预付款明细</h3>
              <form id="" name="" method="POST" action="">
                <table>
                  <tr><td>选择时间：</td><td><input type="text" name="sDate1" style="width:80px;"  onfocus="HS_setDate(this)">至<input type="text" name="sDate2" style="width:80px;"  onfocus="HS_setDate(this)"></td><td>&nbsp;&nbsp;&nbsp;</td><td><input type="button" value="查询"></td></tr>
                </table>
              </form>
              <div class="link">
                充值记录
                <a href="<?php echo U('Pay/list_re');?>">扣款记录</a>
              </div>
              <div class="Tevents">
                <table><!--全部明细-->
                  <tr><td>日期</td><td>金额</td><td>类别</td><td>订单号</td></tr>
                   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo (date("Y-m-d H:i:s",$vo["createtime"])); ?></td><td><?php echo ($vo["money"]); ?></td><td><?php echo ($t); ?></td><td><?php echo ($vo["out_trade_no"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <?php echo ($page); ?>
              </div>
          </div>
        </div>
       </div> <!--s_right 结束标签-->
    </div>
  </div>
</body>
</html>