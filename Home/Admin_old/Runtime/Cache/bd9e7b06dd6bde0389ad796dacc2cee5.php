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

<META http-equiv=Content-Type content="text/html; charset=utf-8">
<STYLE type=text/css> 
input{
	width:100%;
	height:30px;
	border-style:none
}
{
	FONT-SIZE: 12px
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
</HEAD>
<BODY style="BACKGROUND-POSITION-Y: -120px; BACKGROUND-IMAGE: url(__STATICS__/images/bg.gif); BACKGROUND-REPEAT: repeat-x">
<DIV>
  <TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
    <TBODY>
      <TR 
  style="BACKGROUND-IMAGE: url(__STATICS__/images/bg_header.gif); BACKGROUND-REPEAT: repeat-x" 
  height=47>
        <TD width=10><SPAN 
      style="FLOAT: left; BACKGROUND-IMAGE: url(__STATICS__/images/main_hl.gif); WIDTH: 15px; BACKGROUND-REPEAT: no-repeat; HEIGHT: 47px"></SPAN></TD>
        <TD><SPAN 
      style="FLOAT: left; BACKGROUND-IMAGE: url(__STATICS__/images/main_hl2.gif); WIDTH: 15px; BACKGROUND-REPEAT: no-repeat; HEIGHT: 47px"></SPAN><SPAN 
      style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; FLOAT: left; BACKGROUND-IMAGE: url(__STATICS__/images/main_hb.gif); PADDING-BOTTOM: 10px; COLOR: white; PADDING-TOP: 10px; BACKGROUND-REPEAT: repeat-x; HEIGHT: 47px; TEXT-ALIGN: center; 0px: ">用户管理 </SPAN><SPAN 
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
            <TABLE class=gridView id=ctl00_ContentPlaceHolder2_GridView1 
      style="WIDTH: 100%; BORDER-COLLAPSE: collapse" cellSpacing=0 rules=all 
      border=1>
              <TBODY><form method = "post" action="<?php echo U(User/userlist/p/1);?>">
              <tr><td>按账号查询:</td><td ><input type = "text" name = "account"/></td></tr>
              <tr><td colspan="2"><input type = "submit" value = "查询"  style="cursor:pointer" onmouseover="this.style.backgroundColor='#FF0000'" onmouseout="this.style.backgroundColor='#cccccc'"/></td></tr>
                <TR>
                  <TH class=gridViewHeader style="WIDTH: 80px" scope=col>&nbsp;</TH>
                  <TH class=gridViewHeader scope=col>用户id</TH>
                  <TH class=gridViewHeader scope=col>用户类型</TH>
                  <TH class=gridViewHeader scope=col>账户</TH>
                  <TH class=gridViewHeader scope=col>昵称</TH>      
                  <TH class=gridViewHeader scope=col>真实姓名</TH>  
                  <TH class=gridViewHeader scope=col>是否真实用户</TH>  
                  <TH class=gridViewHeader scope=col>简介</TH>   
                  <TH class=gridViewHeader scope=col>禁用</TH>   
                  <TH class=gridViewHeader scope=col>创建时间</TH>   
                     
                </TR>
                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
  	 <TD class=gridViewItem style="WIDTH: 50px"><IMG src="__STATICS__/index/EmployeeMgr/bg_users.gif">
     <td class=gridViewItem><?php echo ($vo["id"]); ?></td>
     <td class=gridViewItem><?php echo ($vo["type"]); ?></td>
     <td class=gridViewItem><?php echo ($vo["account"]); ?></td>
     <td class=gridViewItem><?php echo ($vo["nickname"]); ?></td>
     <td class=gridViewItem><?php echo ($vo["realname"]); ?></td>
      <?php if($vo["isreal"] == 1): ?><td class=gridViewItem><a href="<?php echo U('/User/update/id');?>/<?php echo ($vo["id"]); ?>">设置为不真实</a></td><?php else: ?>
     <td class=gridViewItem>不真实用户</td><?php endif; ?>
     <td class=gridViewItem><?php echo ($vo["info"]); ?></td>
      <?php if($vo["status"] == 0): ?><td class=gridViewItem><a href="<?php echo U('/User/update/pid');?>/<?php echo ($vo["id"]); ?>" style="color:red">取消通过</a></td><?php else: ?>
      <td class=gridViewItem><a href="<?php echo U('/User/update/pid');?>/<?php echo ($vo["id"]); ?>">通过审核</a></td><?php endif; ?>
     <td class=gridViewItem><?php echo (date('Y-m-d H:i:s',$vo["createtime"])); ?> </td>
     
  </tr><?php endforeach; endif; ?>
              </TBODY>
            </TABLE>
           <?php echo ($page); ?>
          </DIV>
        </TD>
        <TD style="BACKGROUND-IMAGE: url(__STATICS__/images/main_rs.gif)"></TD>
      </TR>
      <TR 
  style="BACKGROUND-IMAGE: url(__STATICS__/images/main_fs.gif); BACKGROUND-REPEAT: repeat-x" 
  height=10>
        <TD style="BACKGROUND-IMAGE: url(__STATICS__/images/main_lf.gif)"></TD>
        <TD style="BACKGROUND-IMAGE: url(__STATICS__/images/main_fs.gif)"></TD>
        <TD 
style="BACKGROUND-IMAGE: url(__STATICS__/images/main_rf.gif)"></TD>
      </TR>
    </TBODY>
  </TABLE>
</DIV>
</BODY>
</HTML>