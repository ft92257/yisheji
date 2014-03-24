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

<script type="text/javascript" src="__TMPL__Common/js/deal_item_edit.js"></script>
<div class="main">
<div class="main_title"><?php echo L("EDIT");?> <a href="<?php echo u("Deal/deal_item",array("id"=>$vo['deal_id']));?>" class="back_list"><?php echo L("BACK_LIST");?></a></div>
<div class="blank5"></div>
<form name="edit" action="__APP__" method="post" enctype="multipart/form-data">
<table class="form conf_tab" cellpadding=0 cellspacing=0 >
	<tr>
		<td colspan=2 class="topTd"></td>
	</tr>
	<tr>
		<td class="item_title">图片:</td>
		<td class="item_input">
			<div style='width:120px; height:40px; margin-left:10px; display:inline-block;  float:left;' class='none_border'><script type='text/javascript'>var eid = 'img0';KE.show({id : eid,items : ['upload_image'],skinType: 'tinymce',allowFileManager : true,resizeMode : 0});</script><div style='font-size:0px;'><textarea id='img0' name='image[]' style='width:120px; height:25px;' ><?php echo ($img_list["0"]); ?></textarea> </div></div><input type='text' id='focus_img0' style='font-size:0px; border:0px; padding:0px; margin:0px; line-height:0px; width:0px; height:0px;' /></div><img src='<?php if($img_list["0"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($img_list["0"]); ?><?php endif; ?>' <?php if($img_list["0"] != ''): ?>onclick='openimg("img0")'<?php endif; ?> style='display:inline-block; float:left; cursor:pointer; margin-left:10px; border:#ccc solid 1px; width:35px; height:35px;' id='img_img0' /><img src='/fw/admin/Tpl/default/Common/images/del.gif' style='<?php if($img_list["0"] == ''): ?>display:none;<?php else: ?>display:inline-block;<?php endif; ?> margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' id='img_del_img0' onclick='delimg("img0")' title='删除' />
			<div style='width:120px; height:40px; margin-left:10px; display:inline-block;  float:left;' class='none_border'><script type='text/javascript'>var eid = 'img1';KE.show({id : eid,items : ['upload_image'],skinType: 'tinymce',allowFileManager : true,resizeMode : 0});</script><div style='font-size:0px;'><textarea id='img1' name='image[]' style='width:120px; height:25px;' ><?php echo ($img_list["1"]); ?></textarea> </div></div><input type='text' id='focus_img1' style='font-size:0px; border:0px; padding:0px; margin:0px; line-height:0px; width:0px; height:0px;' /></div><img src='<?php if($img_list["1"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($img_list["1"]); ?><?php endif; ?>' <?php if($img_list["1"] != ''): ?>onclick='openimg("img1")'<?php endif; ?> style='display:inline-block; float:left; cursor:pointer; margin-left:10px; border:#ccc solid 1px; width:35px; height:35px;' id='img_img1' /><img src='/fw/admin/Tpl/default/Common/images/del.gif' style='<?php if($img_list["1"] == ''): ?>display:none;<?php else: ?>display:inline-block;<?php endif; ?> margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' id='img_del_img1' onclick='delimg("img1")' title='删除' />
			<div style='width:120px; height:40px; margin-left:10px; display:inline-block;  float:left;' class='none_border'><script type='text/javascript'>var eid = 'img2';KE.show({id : eid,items : ['upload_image'],skinType: 'tinymce',allowFileManager : true,resizeMode : 0});</script><div style='font-size:0px;'><textarea id='img2' name='image[]' style='width:120px; height:25px;' ><?php echo ($img_list["2"]); ?></textarea> </div></div><input type='text' id='focus_img2' style='font-size:0px; border:0px; padding:0px; margin:0px; line-height:0px; width:0px; height:0px;' /></div><img src='<?php if($img_list["2"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($img_list["2"]); ?><?php endif; ?>' <?php if($img_list["2"] != ''): ?>onclick='openimg("img2")'<?php endif; ?> style='display:inline-block; float:left; cursor:pointer; margin-left:10px; border:#ccc solid 1px; width:35px; height:35px;' id='img_img2' /><img src='/fw/admin/Tpl/default/Common/images/del.gif' style='<?php if($img_list["2"] == ''): ?>display:none;<?php else: ?>display:inline-block;<?php endif; ?> margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' id='img_del_img2' onclick='delimg("img2")' title='删除' />
			<div style='width:120px; height:40px; margin-left:10px; display:inline-block;  float:left;' class='none_border'><script type='text/javascript'>var eid = 'img3';KE.show({id : eid,items : ['upload_image'],skinType: 'tinymce',allowFileManager : true,resizeMode : 0});</script><div style='font-size:0px;'><textarea id='img3' name='image[]' style='width:120px; height:25px;' ><?php echo ($img_list["3"]); ?></textarea> </div></div><input type='text' id='focus_img3' style='font-size:0px; border:0px; padding:0px; margin:0px; line-height:0px; width:0px; height:0px;' /></div><img src='<?php if($img_list["3"] == ''): ?>./admin/Tpl/default/Common/images/no_pic.gif<?php else: ?><?php echo ($img_list["3"]); ?><?php endif; ?>' <?php if($img_list["3"] != ''): ?>onclick='openimg("img3")'<?php endif; ?> style='display:inline-block; float:left; cursor:pointer; margin-left:10px; border:#ccc solid 1px; width:35px; height:35px;' id='img_img3' /><img src='/fw/admin/Tpl/default/Common/images/del.gif' style='<?php if($img_list["3"] == ''): ?>display:none;<?php else: ?>display:inline-block;<?php endif; ?> margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' id='img_del_img3' onclick='delimg("img3")' title='删除' />
		</td>
	</tr>
	<tr>
		<td class="item_title">价格:</td>
		<td class="item_input"><input type="text" class="textbox require" name="price" value="<?php echo ($vo["price"]); ?>" /></td>
	</tr>
	<tr>
		<td class="item_title">简介:</td>
		<td class="item_input"><textarea name="description" class="textarea"><?php echo ($vo["description"]); ?></textarea></td>
	</tr>
	<tr>
		<td class="item_title">是否需要配送</td>
		<td class="item_input">
			<select name="is_delivery">
				<option value="0" <?php if($vo['is_delivery'] == 0): ?>selected="selected"<?php endif; ?> >否</option>
				<option value="1" <?php if($vo['is_delivery'] == 1): ?>selected="selected"<?php endif; ?> >是</option>
			</select>
		</td>
	</tr>
	<tr id="delivery_fee">
		<td class="item_title">运费:</td>
		<td class="item_input"><input type="text" class="textbox" name="delivery_fee" value="<?php echo ($vo["delivery_fee"]); ?>" /></td>
	</tr>
	
	<tr>
		<td class="item_title">是否限购</td>
		<td class="item_input">
			<select name="is_limit_user">
				<option value="0" <?php if($vo['is_limit_user'] == 0): ?>selected="selected"<?php endif; ?> >否</option>
				<option value="1" <?php if($vo['is_limit_user'] == 1): ?>selected="selected"<?php endif; ?> >是</option>
			</select>
		</td>
	</tr>
	<tr id="limit_user">
		<td class="item_title">限购人数:</td>
		<td class="item_input"><input type="text" class="textbox" name="limit_user" value="<?php echo ($vo["limit_user"]); ?>" /></td>
	</tr>
	
	<tr>
		<td class="item_title">成功后回报天数:</td>
		<td class="item_input"><input type="text" class="textbox" name="repaid_day" value="<?php echo ($vo["repaid_day"]); ?>" /></td>
	</tr>
	
	<tr>
		<td colspan=2 class="bottomTd"></td>
	</tr>
</table>

<div class="blank5"></div>
	<table class="form" cellpadding=0 cellspacing=0>
		<tr>
			<td colspan=2 class="topTd"></td>
		</tr>
		<tr>
			<td class="item_title"></td>
			<td class="item_input">
			<!--隐藏元素-->
			<input type="hidden" name="<?php echo conf("VAR_MODULE");?>" value="Deal" />
			<input type="hidden" name="<?php echo conf("VAR_ACTION");?>" value="update_deal_item" />
			<input type="hidden" name="deal_id" value="<?php echo ($vo["deal_id"]); ?>" />
			<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
			<!--隐藏元素-->
			<input type="submit" class="button" value="<?php echo L("EDIT");?>" />
			<input type="reset" class="button" value="<?php echo L("RESET");?>" />
			</td>
		</tr>
		<tr>
			<td colspan=2 class="bottomTd"></td>
		</tr>
	</table> 		 
</form>
</div>
</body>
</html>