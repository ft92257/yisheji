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
<title>操作失败</title>
</head><body>

<div class="showMsg"><h5><?php echo ($msgTitle); ?></h5>
	<div class="main clearfix">
		<?php if(isset($error)): ?><span style="font-size:24px;color:#f00;"><?php echo ($error); ?></span><?php endif; ?><br><br><br><br>
		<?php if(isset($closeWin)): ?><input type="button" name="close" value="<?php echo ($lang["close"]); ?>" onClick="window.close();"><?php endif; ?>
		<?php if(isset($jumpUrl)): ?><p style="color:#666;">
		系统将在  <span style="color:blue;font-weight:bold"><?php echo ($waitSecond); ?></span>秒后自动跳转，如果不想等待，直接点击<a href="<?php echo ($jumpUrl); ?>">这里</a>
		</p>
		<script language="javascript">setTimeout("location.href = '<?php echo ($jumpUrl); ?>';",<?php echo ($waitSecond*1000); ?>);</script><?php endif; ?>
		<?php if(isset($returnjs)): ?><script style="text/javascript"><?php echo ($returnjs); ?>;</script><?php endif; ?>
		<?php if(isset($dialog)): ?><script style="text/javascript">
		var dialog = "<?php echo ($dialog); ?>";
		if (dialog!='') {
			window.top.right.location.reload();window.top.art.dialog({id:dialog}).close();
		}
		</script><?php endif; ?>
	</div>
</div>

</body>
</html>