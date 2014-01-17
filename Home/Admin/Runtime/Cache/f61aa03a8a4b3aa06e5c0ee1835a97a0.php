<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="__STATICS__/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="__STATICS__/js/common.js"></script>
<script type="text/javascript" src="__STATICS__/js/date.js"></script>
<link rel="stylesheet" type="text/css" href="__STATICS__/css/com_loginstyle.css" />
<link rel="stylesheet" type="text/css" href="__STATICS__/css/com_style.css" />
<link rel="stylesheet" type="text/css" href="__STATICS__/css/main.css" />
<title><?php echo ($Title); ?> | 易设计总后台</title>
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
          <a  id="logoutLink" href="<?php echo U('Manager/logout');?>">退出</a>
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
          <h3>审核管理</h3>
          <ul>
          	<li><a href="<?php echo U('Case/index');?>" data-match="/Case/">案例管理</a></li>
            <li><a href="<?php echo U('Active/index');?>" data-match="/Active/">活动管理</a></li>
			<li><a href="<?php echo U('House/index');?>" data-match="/House/">样板房管理</a></li>
          </ul>
        </div>
        
        <div class="storesettings b">
          <h3>信息管理</h3>
          <ul>
            <li><a href="<?php echo U('Company/index');?>" data-match="/Company/">公司管理</a></li>
            <li><a href="<?php echo U('User/index');?>" data-match="/User/">用户管理</a></li>
			<li><a href="<?php echo U('Report/index');?>" data-match="/Report/">举报管理</a></li>
			<li><a href="<?php echo U('Question/index');?>" data-match="/Question/">题目管理</a></li>
			<li><a href="<?php echo U('Richtext/edit');?>" data-match="/Richtext/">自定义页面</a></li>
          </ul>
        </div>
        
        <div class="promotions l">
          <h3>日志查询</h3>
          <ul>
            <li><a href="<?php echo U('Reserve/index');?>" data-match="/Reserve/">预约单管理</a></li>
			<li><a href="<?php echo U('Pay/index');?>" data-match="/Pay/">充值记录</a></li>
            <li><a href="<?php echo U('Money/index');?>" data-match="/Money/">消费记录</a></li>
			<li><a href="<?php echo U('Score/index');?>" data-match="/Score/">评分管理</a></li>
          </ul>
        </div>
      </div>
	  
	  <script>
	  	selectNav('left_nav', 'current');
	  </script>
<div class="right">
	<h2>添加页面</h2>
	<div class="b frame">
		<h3>填写基本信息</h3>
		当前父菜单:<?php if(is_array($parent_menus)): foreach($parent_menus as $key=>$pm): ?><a href="<?php echo ($pm["href"]); ?>" class="<?php echo ($pm["current"]); ?>"><?php echo ($pm["menu"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</a><?php endforeach; endif; ?>
		<a href="<?php echo U('add');?>">+添加父菜单</a><br>
		当前子菜单：<?php if(is_array($menus)): foreach($menus as $key=>$mu): ?><a href="<?php echo ($mu["href"]); ?>" class="<?php echo ($mu["current"]); ?>"><?php echo ($mu["menu"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</a><?php endforeach; endif; ?>
		<a href="<?php echo ($addhref); ?>">+添加子菜单</a>
		
<script charset="utf-8" src="__STATICS__/js/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__STATICS__/js/kindeditor/lang/zh_CN.js"></script>

<form method="post" action="">
	<table width="100%">
	<tr><td width="80"></td><td></td></tr>
	<?php echo ($formHtml); ?>
	</table>
</form>
	</div>
	
</div>
</body>
</html>