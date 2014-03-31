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

<script type="text/javascript" src="__ROOT__/system/region.js"></script>	
<script type="text/javascript" src="__TMPL__Common/js/deal_edit.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.php?lang=zh-cn" ></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/js/calendar/calendar.css" />
<script type="text/javascript" src="__TMPL__Common/js/calendar/calendar.js"></script>
<div class="main">
<div class="main_title"><?php echo L("ADD");?> <a href="<?php echo u("Deal/online_index");?>" class="back_list"><?php echo L("BACK_LIST");?></a></div>
<div class="blank5"></div>
<form name="edit" action="__APP__" method="post" enctype="multipart/form-data">
<table class="form conf_tab" cellpadding=0 cellspacing=0 >
	<tr>
		<td colspan=2 class="topTd"></td>
	</tr>
	<tr>
		<td class="item_title">名称:</td>
		<td class="item_input"><input type="text" class="textbox require" name="name" /></td>
	</tr>
	<tr>
		<td class="item_title">发起人ID:</td>
		<td class="item_input"><input type="text" class="textbox" name="user_id" style="width:30px;" /> <span class='tip_span'>不填写表示管理员发起</span></td>
	</tr>
	<tr>
		<td class="item_title">图片:</td>
		<td class="item_input">
			<div style='width:120px; height:40px; margin-left:10px; display:inline-block;  float:left;' class='none_border'><script type='text/javascript'>var eid = 'image';KE.show({id : eid,items : ['upload_image'],skinType: 'tinymce',allowFileManager : true,resizeMode : 0});</script><div style='font-size:0px;'><textarea id='image' name='image' style='width:120px; height:25px;' ></textarea> </div><input type='text' id='focus_image' style='font-size:0px; border:0px; padding:0px; margin:0px; line-height:0px; width:0px; height:0px;' /></div><img src='./admin/Tpl/default/Common/images/no_pic.gif'  style='display:inline-block; float:left; cursor:pointer; margin-left:10px; border:#ccc solid 1px; width:35px; height:35px;' id='img_image' /><img src='/fw/admin/Tpl/default/Common/images/del.gif' style='display:none; margin-left:10px; float:left; border:#ccc solid 1px; width:35px; height:35px; cursor:pointer;' id='img_del_image' onclick='delimg("image")' title='删除' />
		</td>
	</tr>
	<tr>
		<td class="item_title">视频地址:</td>
		<td class="item_input"><input type="text" class="textbox" name="vedio" /></td>
	</tr>
	<tr>
		<td class="item_title">参考上线天数:</td>
		<td class="item_input"><input type="text" class="textbox" name="deal_days" /></td>
	</tr>
	<tr>
		<td class="item_title">开始时间:</td>
		<td class="item_input">
			<input type="text" class="textbox require" name="begin_time" id="begin_time" value="" onfocus="this.blur(); return showCalendar('begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_begin_time');" />
			<input type="button" class="button" id="btn_begin_time" value="<?php echo L("SELECT_TIME");?>" onclick="return showCalendar('begin_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_begin_time');" />	
			<input type="button" class="button" value="<?php echo L("CLEAR_TIME");?>" onclick="$('#begin_time').val('');" />	

		</td>
	</tr>
	<tr>
		<td class="item_title">结束时间:</td>
		<td class="item_input">
			<input type="text" class="textbox require" name="end_time" id="end_time" value="" onfocus="this.blur(); return showCalendar('end_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_end_time');" />
			<input type="button" class="button" id="btn_end_time" value="<?php echo L("SELECT_TIME");?>" onclick="return showCalendar('end_time', '%Y-%m-%d %H:%M:%S', false, false, 'btn_end_time');" />	
			<input type="button" class="button" value="<?php echo L("CLEAR_TIME");?>" onclick="$('#end_time').val('');" />

		</td>
	</tr>
	
	<tr>
		<td class="item_title">上架:</td>
		<td class="item_input">
			<label><?php echo L("IS_EFFECT_1");?><input type="radio" name="is_effect" value="1" checked="checked" /></label>
			<label><?php echo L("IS_EFFECT_0");?><input type="radio" name="is_effect" value="0" /></label>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">目标金额:</td>
		<td class="item_input"><input type="text" class="textbox" name="limit_price" /></td>
	</tr>
	
	<tr>
		<td class="item_title">简介:</td>
		<td class="item_input">
			<textarea name="brief" class="textarea"></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">详情:</td>
		<td class="item_input">
			 <script type='text/javascript'> var eid = 'description';KE.show({id : eid,skinType: 'tinymce',allowFileManager : true,resizeMode : 0,items : [
							'source','fullscreen', 'undo', 'redo', 'print', 'cut', 'copy', 'paste',
							'plainpaste', 'wordpaste', 'justifyleft', 'justifycenter', 'justifyright',
							'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
							'superscript', 'selectall', '-',
							'title', 'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold',
							'italic', 'underline', 'strikethrough', 'removeformat', 'image',
							'flash', 'media', 'table', 'hr', 'emoticons', 'link', 'unlink'
						]});</script><div  style='margin-bottom:5px; '><textarea id='description' name='description' style='width:750px; height:350px;' ></textarea> </div>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">标签:</td>
		<td class="item_input"><input type="text" class="textbox" name="tags" style="width:500px;" /> <span class='tip_span'>用空格分隔</span></td>
	</tr>
	
	<tr>
		<td class="item_title">分类:</td>
		<td class="item_input">
			<select name="cate_id" class="require">
				<option value="0">请选择</option>
				<?php if(is_array($cate_list)): foreach($cate_list as $key=>$cate_item): ?><option value="<?php echo ($cate_item["id"]); ?>"><?php echo ($cate_item["name"]); ?></option><?php endforeach; endif; ?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">所属地区:</td>
		<td class="item_input">
			<select name="province">				
			<option value="" rel="0">请选择省份</option>
			<?php if(is_array($region_lv2)): foreach($region_lv2 as $key=>$region): ?><option value="<?php echo ($region["name"]); ?>" rel="<?php echo ($region["id"]); ?>"><?php echo ($region["name"]); ?></option><?php endforeach; endif; ?>
			</select>
			
			<select name="city">				
			<option value="" rel="0">请选择城市</option>
			</select>
			<script type="text/javascript">
				load_city();
			</script>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">排序:</td>
		<td class="item_input"><input type="text" class="textbox" name="sort" value="<?php echo ($new_sort); ?>" /></td>
	</tr>
	
	<tr>
		<td class="item_title">常见问题: [<a href="javascript:void(0);" onclick="add_faq();">增加</a>]</td>
		<td class="item_input" id="faq">
			
		</td>
	</tr>
	
	
	<tr>
		<td class="item_title">SEO标题:</td>
		<td class="item_input">
			<textarea name="seo_title" class="textarea"></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">SEO关键词:</td>
		<td class="item_input">
			<textarea name="seo_keyword" class="textarea"></textarea>
		</td>
	</tr>
	
	<tr>
		<td class="item_title">SEO描述:</td>
		<td class="item_input">
			<textarea name="seo_description" class="textarea"></textarea>
		</td>
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
			<input type="hidden" name="<?php echo conf("VAR_ACTION");?>" value="insert" />
			<!--隐藏元素-->
			<input type="submit" class="button" value="<?php echo L("ADD");?>" />
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