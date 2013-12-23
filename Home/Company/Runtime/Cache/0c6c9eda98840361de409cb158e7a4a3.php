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
	<h2><a href="<?php echo U('index');?>">评分管理</a></h2>
	<div class="b frame">
		<h3>填写回复内容</h3>

<form method="post" action="">
	<table width="100%">
	<tr><td width="120"></td><td></td></tr>
	<tr><td class="Caption">项目名称</td><td><span><?php echo ($data["case_name"]); ?></span></td></tr>
	<tr><td class="Caption">项目开始</td><td><span><?php echo ($data["case_begin"]); ?></span></td></tr>
	<tr><td class="Caption">项目结束</td><td><span><?php echo ($data["case_end"]); ?></span></td></tr>
	<tr><td class="Caption">技能评分</td><td><span><?php echo ($data["score_skill"]); ?></span></td></tr>
	<tr><td class="Caption">服务评分</td><td><span><?php echo ($data["score_service"]); ?></span></td></tr>
	<?php if($data["comment"] != ''): ?><tr><td class="Caption">业主评论</td><td><span><?php echo ($data["comment"]); ?></span></td></tr>
	<tr><td class="Caption">我的回复</td><td><textarea <?php if($reply_disable == 1): ?>disabled="disabled"<?php endif; ?> name="reply" id="FM_reply" rows="6" cols="50"><?php echo ($data["reply"]); ?></textarea></td></tr><?php endif; ?>
	<?php if($data["additional"] != ''): ?><tr><td class="Caption">业主追评</td><td><span><?php echo ($data["additional"]); ?></span></td></tr>
	<tr><td class="Caption">追评回复</td><td><textarea <?php if($additional_disable == 1): ?>disabled="disabled"<?php endif; ?> name="additional_reply" id="FM_additional_reply" rows="6" cols="50"><?php echo ($data["additional_reply"]); ?></textarea></td></tr><?php endif; ?>
	<tr><td class="Caption"></td><td><input type="submit" value=" 保 存 " /></td></tr>
	</table>
</form>
	</div>
	
</div>
</body>
</html>