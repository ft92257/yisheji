<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>易监理登录</TITLE>
<script language="javascript">
function freshverity(){
	document.getElementById('veriry').src="<?php echo U('/Manager/verify/');?>";
}
</script>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK 
href="__STATICS__/images/public.css" type=text/css rel=stylesheet>
<LINK 
href="__STATICS__/images/login.css" type=text/css rel=stylesheet>
</HEAD>
<BODY>
<DIV id=div1>
 <form method="post" >
  <TABLE id=login height="100%" cellSpacing=0 cellPadding=0 width=800 
align=center>
    <TBODY>
      <TR id=main>
        <TD>
          <TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%">
            <TBODY>
              <TR>
                <TD colSpan=4>&nbsp;</TD>
              </TR>
              <TR height=30>
                <TD width=380>&nbsp;</TD>
                <TD>&nbsp;</TD>
                <TD>&nbsp;</TD>
                <TD>&nbsp;</TD>
              </TR>
              <TR height=40>
                <TD rowSpan=4>&nbsp;</TD>
                <TD>账　号：</TD>
                <TD>
                  <INPUT class=textbox id=txtUserName type="text" name="account">
                </TD>
                <TD width=120>&nbsp;</TD>
              </TR>
              <TR height=40>
                <TD>密　码：</TD>
                <TD>
                  <INPUT class=textbox id=txtUserPassword type=password 
            name=password>
                </TD>
                <TD width=120>&nbsp;</TD>
              </TR>
              <TR height=40>
                <TD>验证码：</TD>
                <TD vAlign=center colSpan=2>
                  <INPUT id=txtSN size=4  type="text" name="verify">
                  <IMG id="veriry" src="<?php echo U('/Manager/verify/');?>"  border=0> <button type="button" onclick="freshverity()">不清楚，再来一张</button></TD>
              </TR></form>
              <TR height=40>
                <TD align=left>
                  <INPUT id=btnLogin type=submit value=" 登 录 " name=login  style="cursor:pointer" onmouseover="this.style.backgroundColor='#FF0000'" onmouseout="this.style.backgroundColor='#cccccc'">
                </TD>
                <TD width=120>&nbsp;</TD>
              </TR>
              <TR height=110>
                <TD colSpan=4>&nbsp;</TD>
              </TR>
            </TBODY>
          </TABLE>
        </TD>
      </TR>
      <TR id=root height=104>
        <TD>&nbsp;</TD>
      </TR>
    </TBODY>
  </TABLE>
</DIV>
<DIV id=div2 style="DISPLAY: none"></DIV>
</CONTENTTEMPLATE>
</BODY>
</HTML>