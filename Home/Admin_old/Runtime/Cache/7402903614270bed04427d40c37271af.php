<?php if (!defined('THINK_PATH')) exit();?>﻿﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<STYLE type=text/css> 
.current{
		color:red;
	}
{
	FONT-SIZE: 12px
}
textarea{
	width:100%;
}
input{
	width:100%;
	height:30px;
	border-style:none
}
.gridView {
	BORDER-RIGHT: #bad6ec 1px; BORDER-TOP: #bad6ec 1px; BORDER-LEFT: #bad6ec 1px; COLOR: #566984; BORDER-BOTTOM: #bad6ec 1px; FONT-FAMILY: Courier New
}
.gridViewHeader {
	BORDER-RIGHT: #bad6ec 1px solid; BORDER-TOP: #bad6ec 1px solid; BACKGROUND-IMAGE: url(__STATICS__/images/bg_th.gif); BORDER-LEFT: #bad6ec 1px solid; LINE-HEIGHT: 27px; BORDER-BOTTOM: #bad6ec 1px solid
}
.gridViewItem {
	BORDER-RIGHT: #bad6ec 1px solid; BORDER-TOP: #bad6ec 1px solid; BORDER-LEFT: #bad6ec 1px solid; LINE-HEIGHT: 32px; BORDER-BOTTOM: #bad6ec 1px solid; TEXT-ALIGN: center
}
.cmdField {
	BORDER-RIGHT: 0px; BORDER-TOP: 0px; BACKGROUND-IMAGE: url(__STATICS__/images/bg_rectbtn.png); OVERFLOW: hidden; BORDER-LEFT: 0px; WIDTH: 67px; COLOR: #364c6d; LINE-HEIGHT: 27px; BORDER-BOTTOM: 0px; BACKGROUND-REPEAT: repeat-x; HEIGHT: 27px; BACKGROUND-COLOR: transparent; TEXT-DECORATION: none
}
.buttonBlue {
	BORDER-RIGHT: 0px; BORDER-TOP: 0px; BACKGROUND-IMAGE: url(__STATICS__/images/bg_button_blue.gif); BORDER-LEFT: 0px; WIDTH: 78px; COLOR: white; BORDER-BOTTOM: 0px; BACKGROUND-REPEAT: no-repeat; HEIGHT: 21px
}
</STYLE>
<script charset="utf-8" src="__STATICS__/js/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__STATICS__/js/kindeditor/lang/zh_CN.js"></script>
<script>
        KindEditor.ready(function(K) {
            window.editor = K.create('#editor_id', {
				'uploadJson' : "<?php echo U('/Richtext/upload');?>"
			});
        });
</script>
</head>
<body>
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
    <TBODY>
      <TR 
  style="BACKGROUND-IMAGE: url(__STATICS__/images/bg_header.gif); BACKGROUND-REPEAT: repeat-x" 
  height=47>
        <TD width=10><SPAN 
      style="FLOAT: left; BACKGROUND-IMAGE: url(__STATICS__/images/main_hl.gif); WIDTH: 15px; BACKGROUND-REPEAT: no-repeat; HEIGHT: 47px"></SPAN></TD>
        <TD><SPAN 
      style="FLOAT: left; BACKGROUND-IMAGE: url(__STATICS__/images/main_hl2.gif); WIDTH: 15px; BACKGROUND-REPEAT: no-repeat; HEIGHT: 47px"></SPAN><SPAN 
      style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; FLOAT: left; BACKGROUND-IMAGE: url(__STATICS__/images/main_hb.gif); PADDING-BOTTOM: 10px; COLOR: white; PADDING-TOP: 10px; BACKGROUND-REPEAT: repeat-x; HEIGHT: 47px; TEXT-ALIGN: center; 0px: ">菜单管理 </SPAN><SPAN 
      style="FLOAT: left; BACKGROUND-IMAGE: url(__STATICS__/images/main_hr.gif); WIDTH: 60px; BACKGROUND-REPEAT: no-repeat; HEIGHT: 47px"></SPAN></TD>
        <TD 
    style="BACKGROUND-POSITION: 50% bottom; BACKGROUND-IMAGE: url(__STATICS__/images/main_rc.gif)" 
    width=10></TD>
      </TR>
      <TR>
        <TD style="BACKGROUND-IMAGE: url(__STATICS__/images/main_ls.gif)">&nbsp;</TD>
        <TD 
    style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 10px; COLOR: #566984; PADDING-TOP: 10px; BACKGROUND-COLOR: white" 
    vAlign=top align=middle>
          <DIV>
              <form method="post" enctype="multipart/form-data">
            <TABLE class=gridView id=ctl00_ContentPlaceHolder2_GridView1 
      style="WIDTH: 100%; BORDER-COLLAPSE: collapse" cellSpacing=0 rules=all 
      border=1>
              <TBODY>
               <TR>
                  <TH colspan="2" class=gridViewHeader style="WIDTH: 50px" scope=col style="width:330px"><font color="red">菜单管理</font></TH>
               </TR>
               <tr>
               		<td class=gridViewItem>当前父菜单:</td>
               		<td class=gridViewItem><?php if(is_array($parent_menus)): foreach($parent_menus as $key=>$pm): ?><a href="<?php echo ($pm["href"]); ?>" class="<?php echo ($pm["current"]); ?>"><?php echo ($pm["menu"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</a><?php endforeach; endif; ?></td>
               </tr>
               <tr>
               		<td class=gridViewItem>当前子菜单：</td>
               		<td class=gridViewItem><?php if(is_array($menus)): foreach($menus as $key=>$mu): ?><a href="<?php echo ($mu["href"]); ?>" class="<?php echo ($mu["current"]); ?>"><?php echo ($mu["menu"]); ?>&nbsp;&nbsp;|&nbsp;&nbsp;</a><?php endforeach; endif; ?></td>
               </tr>
               <tr>
               		<td class=gridViewItem>添加子菜单：</td>
               		<td class=gridViewItem>+<a href="<?php echo ($addhref); ?>">添加子菜单</a></td>
               </tr>
                <tr>
                  	<td class=gridViewItem >标题：</td>
                  	<td class=gridViewItem><input type="text" name="title" value="<?php echo ($cont["title"]); ?>" /></td>
                </tr>
                <tr>
               		<td class=gridViewItem>内容：</td>
               		<td class=gridViewItem><textarea id="editor_id" name="text" style="width:100%;height:500px;"><?php echo ($cont["text"]); ?></textarea></td>
               </tr>
                 <tr>
               		<td colspan="2" class=gridViewItem><input type="submit" value="提交" style="cursor:pointer" onmouseover="this.style.backgroundColor='#FF0000'" onmouseout="this.style.backgroundColor='#cccccc'"/></td>
               	</tr>
				</table></form></DIV>
</body>
</html>