<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/style.css" />
<script type="text/javascript">
 	var VAR_MODULE = "<?php echo conf("VAR_MODULE");?>";
	var VAR_ACTION = "<?php echo conf("VAR_ACTION");?>";
	var MODULE_NAME	=	'<?php echo MODULE_NAME; ?>';
	var ACTION_NAME	=	'<?php echo ACTION_NAME; ?>';
	var ROOT = '__APP__';
	var ROOT_PATH = '<?php echo APP_ROOT; ?>';
	var CURRENT_URL = '<?php echo trim($_SERVER['REQUEST_URI']);?>';
	var INPUT_KEY_PLEASE = "<?php echo L("INPUT_KEY_PLEASE");?>";
	var TMPL = '__TMPL__';
	var APP_ROOT = '<?php echo APP_ROOT; ?>';
</script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.timer.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/script.js"></script>
<script type="text/javascript" src="__ROOT__/public/runtime/admin/lang.js"></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/kindeditor.js'></script>
</head>
<body>
<div id="info"></div>

<?php function get_refund($id,$deal)
	{
		if($deal['is_success']==0&&$deal['end_time']<get_gmtime()&&$deal['end_time']!=0)
		{
			return "<a href='".u("Deal/batch_refund",array("id"=>$id))."'>批量退款</a>";
		}
	} ?>
<script type="text/javascript" src="__TMPL__Common/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.weebox.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/deal.js"></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/weebox.css" />
<div class="main">
<div class="main_title">上线项目</div>
<div class="blank5"></div>
<div class="button_row">
	<input type="button" class="button" value="<?php echo L("ADD");?>" onclick="add();" />
	<input type="button" class="button" value="移到回收站" onclick="del();" />
</div>
<div class="blank5"></div>
<div class="search_row">
	<form name="search" action="__APP__" method="get">	
		项目名称：<input type="text" class="textbox" name="name" value="<?php echo trim($_REQUEST['name']);?>" style="width:100px;" />
		时间:<select name="time_status">
				<option value="0" <?php if($_REQUEST['time_status'] == 0): ?>selected="selected"<?php endif; ?>>全部</option>
				<option value="1" <?php if($_REQUEST['time_status'] == 1): ?>selected="selected"<?php endif; ?>>未开始</option>
				<option value="2" <?php if($_REQUEST['time_status'] == 2): ?>selected="selected"<?php endif; ?>>进行中</option>
				<option value="3" <?php if($_REQUEST['time_status'] == 3): ?>selected="selected"<?php endif; ?>>已结束</option>
			</select>
		分类:<select name="cate_id">
				<option value="0" <?php if($_REQUEST['time_status'] == 0): ?>selected="selected"<?php endif; ?>>全部</option>
				<?php if(is_array($cate_list)): foreach($cate_list as $key=>$cate_item): ?><option value="<?php echo ($cate_item["id"]); ?>" <?php if($_REQUEST['cate_id'] == $cate_item['id']): ?>selected="selected"<?php endif; ?>><?php echo ($cate_item["name"]); ?></option><?php endforeach; endif; ?>
			</select>
		发起人ID: <input type="text" class="textbox" name="user_id" value="<?php echo trim($_REQUEST['user_id']);?>" style="width:30px;" />
		<input type="hidden" value="Deal" name="m" />
		<input type="hidden" value="online_index" name="a" />
		<input type="submit" class="button" value="<?php echo L("SEARCH");?>" />
	</form>
</div>
<div class="blank5"></div>
<!-- Think 系统列表组件开始 -->
<table id="dataTable" class="dataTable" cellpadding=0 cellspacing=0 ><tr><td colspan="13" class="topTd" >&nbsp; </td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('dataTable')"></th><th width="50px   "><a href="javascript:sortBy('id','<?php echo ($sort); ?>','Deal','online_index')" title="按照<?php echo L("ID");?><?php echo ($sortType); ?> "><?php echo L("ID");?><?php if(($order)  ==  "id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="220px"><a href="javascript:sortBy('name','<?php echo ($sort); ?>','Deal','online_index')" title="按照项目名称<?php echo ($sortType); ?> ">项目名称<?php if(($order)  ==  "name"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="50px   "><a href="javascript:sortBy('user_id','<?php echo ($sort); ?>','Deal','online_index')" title="按照发起人<?php echo ($sortType); ?> ">发起人<?php if(($order)  ==  "user_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('support_amount','<?php echo ($sort); ?>','Deal','online_index')" title="按照已筹金额   <?php echo ($sortType); ?> ">已筹金额   <?php if(($order)  ==  "support_amount"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_success','<?php echo ($sort); ?>','Deal','online_index')" title="按照成功    <?php echo ($sortType); ?> ">成功    <?php if(($order)  ==  "is_success"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="50px   "><a href="javascript:sortBy('focus_count','<?php echo ($sort); ?>','Deal','online_index')" title="按照关注<?php echo ($sortType); ?> ">关注<?php if(($order)  ==  "focus_count"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th width="50px   "><a href="javascript:sortBy('support_count','<?php echo ($sort); ?>','Deal','online_index')" title="按照支持<?php echo ($sortType); ?> ">支持<?php if(($order)  ==  "support_count"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('end_time','<?php echo ($sort); ?>','Deal','online_index')" title="按照结束时间   <?php echo ($sortType); ?> ">结束时间   <?php if(($order)  ==  "end_time"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('sort','<?php echo ($sort); ?>','Deal','online_index')" title="按照<?php echo L("SORT");?>   <?php echo ($sortType); ?> "><?php echo L("SORT");?>   <?php if(($order)  ==  "sort"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_recommend','<?php echo ($sort); ?>','Deal','online_index')" title="按照推荐   <?php echo ($sortType); ?> ">推荐   <?php if(($order)  ==  "is_recommend"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_classic','<?php echo ($sort); ?>','Deal','online_index')" title="按照经典<?php echo ($sortType); ?> ">经典<?php if(($order)  ==  "is_classic"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal): ++$i;$mod = ($i % 2 )?><tr class="row" ><td><input type="checkbox" name="key" class="key" value="<?php echo ($deal["id"]); ?>"></td><td>&nbsp;<?php echo ($deal["id"]); ?></td><td>&nbsp;<a href="javascript:edit   ('<?php echo (addslashes($deal["id"])); ?>')"><?php echo (msubstr($deal["name"])); ?></a></td><td>&nbsp;<?php echo (get_deal_user($deal["user_id"])); ?></td><td>&nbsp;<?php echo (format_price($deal["support_amount"])); ?></td><td>&nbsp;<?php echo (get_status($deal["is_success"])); ?></td><td>&nbsp;<?php echo ($deal["focus_count"]); ?></td><td>&nbsp;<?php echo ($deal["support_count"]); ?></td><td>&nbsp;<?php echo (get_to_date($deal["end_time"])); ?></td><td>&nbsp;<?php echo (get_sort($deal["sort"],$deal['id'])); ?></td><td>&nbsp;<?php echo (get_toogle_status($deal["is_recommend"],$deal['id'],is_recommend)); ?></td><td>&nbsp;<?php echo (get_toogle_status($deal["is_classic"],$deal['id'],is_classic)); ?></td><td><a href="javascript:edit('<?php echo ($deal["id"]); ?>')"><?php echo L("EDIT");?></a>&nbsp;<a href="javascript: del('<?php echo ($deal["id"]); ?>')">移到回收站</a>&nbsp;<a href="javascript: deal_item('<?php echo ($deal["id"]); ?>')">项目子项</a>&nbsp;<a href="javascript: pay_log('<?php echo ($deal["id"]); ?>')">发放筹款</a>&nbsp;<a href="javascript: deal_log('<?php echo ($deal["id"]); ?>')">项目日志</a>&nbsp; <?php echo (get_refund($deal["id"],$deal)); ?>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="13" class="bottomTd"> &nbsp;</td></tr></table>
<!-- Think 系统列表组件结束 -->
 

<div class="blank5"></div>
<div class="page"><?php echo ($page); ?></div>
</div>
</body>
</html>