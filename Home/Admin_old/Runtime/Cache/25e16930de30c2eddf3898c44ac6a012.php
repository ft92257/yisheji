<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="__STATICS__/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="__STATICS__/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__STATICS__/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="__STATICS__/css/main.css" />
<title><?php echo ($Title); ?> | 易监理 - 装修行业中代表良心的力量，家装监理，连锁店装修监理，别墅装修监理，别墅监理，上海家装监理公司，家装监理公司，上海装修监理公司，家装监理，装潢监理，上海家装监理，上海装潢监理，上海装饰监理，上海装修监理，上海家庭装潢监理，装修监理，上海装修监理，验房，上海验房，家装监理师，装饰监理师，别墅监理，别墅装饰监理，家装工程监理，家庭装修监理，水电监理，家装监理费，家装施工监理，装修第三方监理</title>
<meta name="keywords" content="易监理,上海家装监理公司,家装监理公司,上海装修监理公司,家装监理,装潢监理,上海家装监理,上海装潢监理,上海装饰监理,上海装修监理,上海家庭装潢监理,装修监理,上海装修监理,验房,上海验房,家装监理师,装饰监理师,别墅监理,别墅装饰监理,家装工程监理,家庭装修监理,水电监理,家装监理费,家装施工监理,装修第三方监理"/>
<meta name="description" content="易监理，上海家装监理公司，家装监理公司，上海装修监理公司，家装监理，装潢监理，上海家装监理，上海装潢监理，上海装饰监理，上海装修监理，上海家庭装潢监理，装修监理，上海装修监理，验房，上海验房，家装监理师，装饰监理师，别墅监理，别墅装饰监理，家装工程监理，家庭装修监理，水电监理，家装监理费，家装施工监理，装修第三方监理"/>

<title>操作成功</title>
</head><body>

<div class="showMsg"><h5><?php echo ($msgTitle); ?></h5>
	<div class="main clearfix">
		<?php if(isset($message)): ?><span style="font-size:24px;color:#0a0;"><?php echo ($message); ?></span><?php endif; ?><br><br><br><br>
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