<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title>codec2i - 众筹系统安装程序  -- 安装向导</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__TMPL__Public/css/style.css" />
<script type="text/javascript" src="__TMPL__Public/js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Public/js/jquery.json.js"></script>
<script type="text/javascript" src="__TMPL__Public/js/script.js"></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '__URL__';
var ROOT_PATH = '__ROOT__';
var APP	 =	 '__APP__';
var VAR_MODULE = '<?php echo c('VAR_MODULE');?>';
var VAR_ACTION = '<?php echo c('VAR_ACTION');?>';
//-->
</script>
</head>
<body>
<div id="ajax_outter">
<div id="ajax_loading">
	<div id="tip"></div> 
	<div class="blank"></div>
	<img src='__ROOT__/install/Tpl/default/Public/images/ajaxloading.gif' valign="absmiddle" />
</div>
</div>
<div class="install">
<form name="install" action="<?php echo u('Index/install');?>" method="POST" id="install">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  	<td colspan="2" style="height:10px;">
	  		
	  	</td>
	  </tr>
	  <tr>
	    <td>数据库主机名/IP：</td>
	    <td><input type="text" value="localhost" name="DB_HOST" /></td>
	  </tr>
	  <tr>
	    <td>数据库名：</td>
	    <td><input type="text" value="" name="DB_NAME" /></td>
	  </tr>
	  <tr>
	    <td>数据库用户名：</td>
	    <td><input type="text" value="root" name="DB_USER" /></td>
	  </tr>
	  <tr>
	    <td>数据库密码：</td>
	    <td><input type="text" value="" name="DB_PWD" /></td>
	  </tr>
	  <tr>
	    <td>端口号：</td>
	    <td><input type="text" value="3306" name="DB_PORT" /></td>
	  </tr>
	  <tr>
	    <td>表前缀</td>
	    <td><input type="text" value="codec2i_" name="DB_PREFIX" /></td>
	  </tr>
	  <tr>
	    <td>安装演示数据</td>
	    <td>
	    	<select name="DEMO_DATA">
	    		<option value="1" selected="selected">是</option>
				<option value="0">否</option>
	    	</select>
		</td>
	  </tr>
	  <tr>
	    <td style="height:50px;"></td>
	    <td><input type="button" value="开始安装" onclick="startInstall();" id="installbtn" /></td>
	  </tr>
	  <tr>
	  	<td colspan="2" style="text-align: center;">
	  		codec2i - 众筹系统安装程序 www.codec2i.net 
	  	</td>
	  </tr>
	</table>
	</form>
</div>
</body>
</html>