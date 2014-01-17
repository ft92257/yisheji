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
      <div class="frame">
          <h2>首页</h2>
          <div class="info b">
            <div class="basic">
                <div><img src="<?php echo ($com["logo"]); ?>" width="50" height="50"></div>
                <h4><?php echo ($com["name"]); ?></h4>&nbsp;&nbsp;&nbsp;
                <span>公司前台页面：</span>
                <span><a href="http://www.yisheji.com" target="_blank"> http://www.yisheji.com/</a></span>
            </div>
        
          <div class="warn">
            <h3>预约单提醒</h3>
            <?php if($num != 0): ?><span>当前有 <a href="<?php echo U('/Reserve/index/handle/0');?>"><?php echo ($num); ?></a> 个未处理预约单。</span>
            <?php else: ?>
            	<span>当前没有预约单提醒。</span><?php endif; ?>
          </div>
          
          
        </div>
        
        
        
      </div> <!--s_right 结束标签-->
    </div>
  </div>
</body>
</html>