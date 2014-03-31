<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if ($this->_var['page_title'] != ''): ?><?php echo $this->_var['page_title']; ?> - <?php endif; ?><?php echo $this->_var['site_name']; ?> - <?php echo $this->_var['seo_title']; ?></title>
<meta name="keywords" content="<?php echo $this->_var['seo_keyword']; ?>" />
<meta name="description" content="<?php echo $this->_var['seo_description']; ?>" />
<style>
.showOne{width:1000px; margin:0 auto; position:relative}
.showOne .cascade{position:absolute; left:230px; top:0px; width:80px; background-color:#282828; text-align:left}
.showOne .cascade a{line-height:30px; height:30px; display:black; padding-left:25px}
.showOne .cascade a:hover{border-left:#707070 5px solid; background-color:#444444; padding-left:20px}



.show{position:absolute;right:115px; background-color:#4C4C4C; height:76px;padding:12px 40px 12px 20px; display:none;color:#9A9A9A; z-index:10;}
.show a{color:#9A9A9A; display:block; width:50px; text-align:center; margin:0 10px 0 15px;}
.show .right{margin-top:2px; width:48px;}
.show .right a{display:inline; width:auto; height:auto; margin:0;}
.show .right p{line-height:24px;}
 .show a:hover{color:#fff; text-decoration:none;}
.show .right a:hover{text-decoration:underline;color:#9a9a9a;}
 .show a:hover .icon-10{background-position:-183px -265px;}
.show a:hover .icon-11{background-position:-247px -265px;}
 
</style>
<?php
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/style.css";
$this->_var['pagecss'][] = $this->_var['TMPL_REAL']."/css/weebox.css";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/jquery-1.8.2.min.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.bgiframe.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.weebox.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.pngfix.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/lazyload.js";
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/script.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/script.js";
if(app_conf("APP_MSG_SENDER_OPEN")==1)
{
$this->_var['pagejs'][] = $this->_var['TMPL_REAL']."/js/msg_sender.js";
$this->_var['cpagejs'][] = $this->_var['TMPL_REAL']."/js/msg_sender.js";
}
if(HAS_DEAL_NOTIFY>0)
{
$this->_var['notifypagejs'][] = $this->_var['TMPL_REAL']."/js/notify_sender.js";
$this->_var['cnotifypagejs'][] = $this->_var['TMPL_REAL']."/js/notify_sender.js";	
}
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['pagecss'],
);
echo $k['name']($k['v']);
?>" />
<script type="text/javascript">
var APP_ROOT = '<?php echo $this->_var['APP_ROOT']; ?>';
var LOADER_IMG = '<?php echo $this->_var['TMPL']; ?>/images/lazy_loading.gif';
var ERROR_IMG = '<?php echo $this->_var['TMPL']; ?>/images/image_err.gif';
<?php if (app_conf ( "APP_MSG_SENDER_OPEN" ) == 1): ?>
var send_span = <?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SEND_SPAN',
);
echo $k['name']($k['v']);
?>000;
<?php endif; ?>
</script>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['pagejs'],
  'c' => $this->_var['cpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<?php if (HAS_DEAL_NOTIFY > 0): ?>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['notifypagejs'],
  'c' => $this->_var['cnotifypagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>
<?php endif; ?>

</head>

<body>
  
<iframe src='../index.php/Public/header_zc' style="width:100%; height:70px; margin-bottom:-5px; border:0 none; display:inline" scrolling="no" frameborder="0"></iframe> 

<div class="showOne">
	<div id="currentMenu"></div>
	<div id="currentMenu2"></div>
</div>


<script>

function showMenu(html,left,top) {
	html = html.replace(/ href="(?!#)/g, ' href="../');
	

	$("#currentMenu").html(html);
	$("#currentMenu").show();
	$("#currentMenu").css("left",left);
	$("#currentMenu").css("top",top);

	$("#currentMenu").mouseover(function(){
		  $(this).show();}).mouseout(function(){
		$(this).hide();
	});
}

function showMenu2(html,left,top) {
	//alert(html);
	html = html.replace(/ href="(?!#)/g, ' href="../');
	
	$("#currentMenu2").css("width",1);
	$("#currentMenu2").css("height",1);
	$("#currentMenu2").html(html);
	$("#currentMenu2").show();
	$("#currentMenu2").css("left",left);
	$("#currentMenu2").css("top",top);

	$("#currentMenu2").mouseover(function(){
		  $(this).show();}).mouseout(function(){
		$(this).hide();
	});
}
</script>

<!-- 
<div class="header">
	<div class="wrap">
		<div class="logo f_l" style="margin-top:10px;">
			<a class="link" href="<?php echo $this->_var['APP_ROOT']; ?>/">
				<?php
					$this->_var['logo_image'] = app_conf("SITE_LOGO");
				?>
				<?php 
$k = array (
  'name' => 'load_page_png',
  'v' => $this->_var['logo_image'],
);
echo $k['name']($k['v']);
?>
			</a>
		</div>
		
	   <div  style="margin-top:13px;float:left">	
		<ul class="main_nav f_l" >
               <?php $_from = $this->_var['nav_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav_item');if (count($_from)):
    foreach ($_from AS $this->_var['nav_item']):
?>
					    <li <?php if ($this->_var['nav_item']['current'] == 1): ?>class="current"<?php endif; ?>>
						<span>
						<a href="<?php echo $this->_var['nav_item']['url']; ?>"  target="<?php if ($this->_var['nav_item']['blank'] == 1): ?>_blank<?php endif; ?>" title="<?php echo $this->_var['nav_item']['name']; ?>"><?php echo $this->_var['nav_item']['name']; ?></a>	
						</span>		
					    </li>
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		
                
		</ul>
        	
		<form action="<?php
echo parse_url_tag("u:deals|"."".""); 
?>" method="post" id="header_search_form" class="f_l" style="margin-top:-2px;margin-left:15px;">
			<div class="header_seach">
-->			
	
			<!--<a href="<?php
echo parse_url_tag("u:project#add|"."".""); 
?>" class="add_project f_r"></a>			-->
			<!--<input type="button" value="" class="seach_submit" id="header_submit" />-->
			
<!-- 	
			<input type="text" id="header_keyword" name="k" value="<?php if ($this->_var['p_k'] != ''): ?><?php echo $this->_var['p_k']; ?><?php else: ?><?php echo $this->_var['lang']['search']; ?><?php endif; ?>" class="seach_text" style="font-size:14px">	
			<input type="hidden" name="redirect" value="1" />				
			</div>
			</form>	
	  </div>	
		<div class="f_r">
			<div class="login_tip">
				<?php 
$k = array (
  'name' => 'login_tip',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
			</div>				
		</div>
	</div>		
</div>

-->