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
{
	FONT-SIZE: 12px
}
#menuTree A {
	COLOR: #566984; TEXT-DECORATION: none
}
</STYLE>
<SCRIPT src="__STATICS__/index/Left/TreeNode.js" type=text/javascript></SCRIPT>
<SCRIPT src="__STATICS__/index/Left/Tree.js" type=text/javascript></SCRIPT>
</HEAD>
<BODY 
style="BACKGROUND-POSITION-Y: -120px; BACKGROUND-IMAGE: url(__STATICS__/images/bg.gif); BACKGROUND-REPEAT: repeat-x">
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
    <TR>
      <TD width=10 height=29><IMG src="__STATICS__/index/Left/bg_left_tl.gif"></TD>
      <TD 
    style="FONT-SIZE: 18px; BACKGROUND-IMAGE: url(__STATICS__/images/bg_left_tc.gif); COLOR: white; FONT-FAMILY: system">Main 
        Menu</TD>
      <TD width=10><IMG src="__STATICS__/index/Left/bg_left_tr.gif"></TD>
    </TR>
    <TR>
      <TD style="BACKGROUND-IMAGE: url(__STATICS__/images/bg_left_ls.gif)"></TD>
      <TD id=menuTree 
    style="PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 10px; PADDING-TOP: 10px; HEIGHT: 100%; BACKGROUND-COLOR: white" 
    vAlign=top></TD>
      <TD style="BACKGROUND-IMAGE: url(__STATICS__/images/bg_left_rs.gif)"></TD>
    </TR>
    <TR>
      <TD width=10><IMG src="__STATICS__/index/Left/bg_left_bl.gif"></TD>
      <TD style="BACKGROUND-IMAGE: url(__STATICS__/images/bg_left_bc.gif)"></TD>
      <TD width=10><IMG 
src="__STATICS__/index/Left/bg_left_br.gif"></TD>
    </TR>
  </TBODY>
</TABLE>
<SCRIPT type="text/javascript">
var tree = null;var root = new TreeNode('系统菜单');var fun1 = new TreeNode('公司管理');var fun2 = new TreeNode('公司列表', "<?php echo U('Company/company');?>", 'tree_node.gif', null, 'tree_node.gif', null);fun1.add(fun2);var fun3 = new TreeNode('添加公司', '<?php echo U('Company/addnew');?>', 'tree_node.gif', null, 'tree_node.gif', null);fun1.add(fun3);root.add(fun1);var fun5 = new TreeNode('文章管理');var fun6 = new TreeNode('添加文章', '<?php echo U('Article/addnews');?>', 'tree_node.gif', null, 'tree_node.gif', null);fun5.add(fun6);var fun7 = new TreeNode('文章列表', '<?php echo U('Article/edit');?>', 'tree_node.gif', null, 'tree_node.gif', null);fun5.add(fun7);root.add(fun5);var fun9 = new TreeNode('菜单管理');var fun10 = new TreeNode('添加父菜单', '<?php echo U('/Richtext/add/id/1');?>', 'tree_node.gif', null, 'tree_node.gif', null);fun9.add(fun10);var fun11 = new TreeNode('添加子菜单', '<?php echo U('/Richtext/edit/id/1');?>', 'tree_node.gif', null, 'tree_node.gif', null);fun9.add(fun11);root.add(fun9);var fun13 = new TreeNode('评论管理');var fun14 = new TreeNode('评论列表及查询', '<?php echo U('/Score/scoreList/');?>', 'tree_node.gif', null, 'tree_node.gif', null);fun13.add(fun14);var fun15 = new TreeNode('查询用户评论', '<?php echo U('/Score/single');?>', 'tree_node.gif', null, 'tree_node.gif', null);fun13.add(fun15);var fun22 = new TreeNode('刷新公司、施工队、样板房评分', "<?php echo U('Score/fresh');?>", 'tree_node.gif', null, 'tree_node.gif', null);fun13.add(fun22);root.add(fun13);
var fun16 = new TreeNode('用户管理');var fun17 = new TreeNode('用户列表', '<?php echo U('User/userlist');?>', 'tree_node.gif', null, 'tree_node.gif', null);fun16.add(fun17);var fun18 = new TreeNode('添加监理', '<?php echo U('User/adduser');?>', 'tree_node.gif', null, 'tree_node.gif', null);fun16.add(fun18);;root.add(fun16);var fun20 = new TreeNode('审核管理');var fun21 = new TreeNode('审核进度修改', "<?php echo U('Certification/cerList');?>", 'tree_node.gif', null, 'tree_node.gif', null);fun20.add(fun21);var fun22 = new TreeNode('刷新公司、施工队、样板房评分', "<?php echo U('Score/fresh');?>", 'tree_node.gif', null, 'tree_node.gif', null);root.add(fun20);
tree = new Tree(root);tree.show('menuTree')
</SCRIPT>
</BODY>
</HTML>