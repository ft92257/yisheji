<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="__STATICS__/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="__STATICS__/js/common.js"></script>
<script type="text/javascript" src="__STATICS__/js/date.js"></script>
<link rel="stylesheet" type="text/css" href="__STATICS__/css/com_loginstyle.css" />
<link rel="stylesheet" type="text/css" href="__STATICS__/css/com_style.css" />
<link rel="stylesheet" type="text/css" href="__STATICS__/css/main.css" />
<title><?php echo ($Title); ?> | 易监理 - 装修行业中代表良心的力量，家装监理，连锁店装修监理，别墅装修监理，别墅监理，上海家装监理公司，家装监理公司，上海装修监理公司，家装监理，装潢监理，上海家装监理，上海装潢监理，上海装饰监理，上海装修监理，上海家庭装潢监理，装修监理，上海装修监理，验房，上海验房，家装监理师，装饰监理师，别墅监理，别墅装饰监理，家装工程监理，家庭装修监理，水电监理，家装监理费，家装施工监理，装修第三方监理</title>
<meta name="keywords" content="易监理,上海家装监理公司,家装监理公司,上海装修监理公司,家装监理,装潢监理,上海家装监理,上海装潢监理,上海装饰监理,上海装修监理,上海家庭装潢监理,装修监理,上海装修监理,验房,上海验房,家装监理师,装饰监理师,别墅监理,别墅装饰监理,家装工程监理,家庭装修监理,水电监理,家装监理费,家装施工监理,装修第三方监理"/>
<meta name="description" content="易监理，上海家装监理公司，家装监理公司，上海装修监理公司，家装监理，装潢监理，上海家装监理，上海装潢监理，上海装饰监理，上海装修监理，上海家庭装潢监理，装修监理，上海装修监理，验房，上海验房，家装监理师，装饰监理师，别墅监理，别墅装饰监理，家装工程监理，家庭装修监理，水电监理，家装监理费，家装施工监理，装修第三方监理"/>

<script>
	var URL = '__URL__';
	var GROUP = '__GROUP__';
</script>

</head>

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
    
    <div class="content" id="left_nav">
      <div class="left">
        <div class="booking b">
          <h3>预约</h3>
          <ul>
            <li><a href="<?php echo U('Reserve/index');?>" data-match="/Reserve/">预约单管理</a></li>
            <li><a href="<?php echo U('Pay/index');?>" data-match="/Pay/">预约款查询</a></li>
          </ul>
        </div>
        
        <div class="storesettings b">
          <h3>公司信息管理</h3>
          <ul>
            <li><a href="<?php echo U('Company/edit');?>" data-match="/Company/">基本资料</a></li>
            <?php if($isCompany == 1): ?><li><a href="<?php echo U('Designer/index');?>" data-match="/Designer/">设计师管理</a></li><?php endif; ?>
            <li><a href="<?php echo U('Case/index');?>" data-match="/Case/">案例管理</a></li>
            <li><a href="<?php echo U('Score/index');?>" data-match="/Score/">评分管理</a></li>
            <li><a href="<?php echo U('House/index');?>" data-match="/House/">样板房管理</a></li>
          </ul>
        </div>
        
        <div class="promotions l">
          <h3>促销活动</h3>
          <ul>
            <li><a href="<?php echo U('Active/index');?>" data-match="/Active/">活动管理</a></li>
            <li><a href="<?php echo U('Active/add');?>" data-match="/Active/add">发布活动</a></li>
          </ul>
        </div>
      </div>
	  
	  <script>
	  	selectNav('left_nav', 'current');
	  </script>
<div class="right">
	<h2>公司信息</h2>
	<div class="b frame">
		<h3>公司基本信息</h3>
		<form method="post" action="" enctype="multipart/form-data">
			<table width="100%">
			<tr><td width="120"></td><td></td></tr>
			<?php echo ($formHtml); ?>
			</table>
		</form>
	</div>
</div>
</body>
</html>