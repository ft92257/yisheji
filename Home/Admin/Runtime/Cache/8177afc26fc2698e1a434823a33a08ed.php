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
<style type="text/css">
body {
        background: #E8F3E2;
  }
</style>
<script language="javascript">
function freshverity(){
	document.getElementById('veriry').src="<?php echo U('/Manager/verify/');?>";
}
</script>
<div class="login">
  <div class="l_header">
     <div class="l_logo"> <img src="__STATICS__/css/com_img/logo.png" width="178" height="60"></div>
     <h2>易设计总后台登录</h2>
  </div>
  <div class="l_content">
      <form id="loginForm" name="loginForm" method="POST" action="">
          <table>
              <tr>
                <td width="100">用户名：</td><td><input id="l_uname" class="l_input" type="text" name="account" /></td>
              </tr>
              <tr>
                <td>密码：</td><td><input id="l_password" class="l_input" type="password" name="password" /></td>
              </tr>
			  <tr>
                <td>验证码：</td><td align="left"><input size="4" type="text" name="verify" /><img id="veriry" src="<?php echo U('/Manager/verify/');?>" style="vertical-align:bottom;" border=0 /> <button type="button" onclick="freshverity()">不清楚，再来一张</button></td>
              </tr>
              <tr><td></td><td><input class="loginsbt" type="submit" value="" /></td></tr>
          </table>
      </form>
  </div>
</div>
</body>
</html>