<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/home.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/discover.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/discover.js";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>

<?php echo $this->fetch('inc/home_user_info.html'); ?>
<div class="blank"></div>
<div class="wrap">
	
	<div class="f_l">
		<ul class="tab-nav">
			<li class="current"><a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['home_user_info']['id']."".""); 
?>">发起的项目</a></li>
			<li><a href="<?php
echo parse_url_tag("u:home#support|"."id=".$this->_var['home_user_info']['id']."".""); 
?>">支持的项目</a></li>
			
		</ul>
	</div>

	<div class="blank"></div>
	<div class="blank"></div>
	<div id="pin_box">
	<?php echo $this->fetch('inc/deal_list.html'); ?>
	</div>	
	<div class="blank"></div>
	<div id="pin_loading" rel="<?php
echo parse_url_tag("u:ajax#homeindex|"."id=".$this->_var['home_user_info']['id']."&p=".$this->_var['current_page']."".""); 
?>">正在努力加载</div>	
	<div class="pages"><?php echo $this->_var['pages']; ?></div>
</div>
<?php echo $this->fetch('inc/footer.html'); ?> 