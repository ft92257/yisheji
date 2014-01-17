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
<STYLE type=text/css> 
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
      style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; FLOAT: left; BACKGROUND-IMAGE: url(__STATICS__/images/main_hb.gif); PADDING-BOTTOM: 10px; COLOR: white; PADDING-TOP: 10px; BACKGROUND-REPEAT: repeat-x; HEIGHT: 47px; TEXT-ALIGN: center; 0px: ">添加文章 </SPAN><SPAN 
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
                  <TH colspan="2" class=gridViewHeader style="WIDTH: 50px" scope=col style="width:330px"><font color="red">添加文章</font></TH>
               </TR>
               <tr>
               		<td class=gridViewItem>作者:</td>
               		<td class=gridViewItem><input type="text" name="author"/></td>
               </tr>
               <tr>
               		<td class=gridViewItem>标题：</td>
               		<td class=gridViewItem><input type="text" name="title"/></td>
               </tr>
               <tr>
               		<td class=gridViewItem>图片：</td>
               		<td class=gridViewItem><input type="file" name="pic"/></td>
               </tr>
                <tr>
                  	<td class=gridViewItem >简介：</td>
                  	<td class=gridViewItem><textarea name="info"></textarea></td>
                </tr>
                <tr>
               		<td class=gridViewItem style="background-color:#AFF7FD">内容：</td>
               		<td class=gridViewItem><textarea id="editor_id" name="content" style="width:100%;height:500px;"></textarea></td>
               </tr>
                 <tr>
               		<td colspan="2" class=gridViewItem><input type="submit" value="提交" style="cursor:pointer" onmouseover="this.style.backgroundColor='#FF0000'" onmouseout="this.style.backgroundColor='#cccccc'"/></td>
               	</tr>
				</table></form></DIV>
</body>
</html>