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
			<li><a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['home_user_info']['id']."".""); 
?>"><?php echo $this->_var['lang']['start']; ?><?php echo $this->_var['lang']['project']; ?></a></li>
			<li class="current"><a href="<?php
echo parse_url_tag("u:home#support|"."id=".$this->_var['home_user_info']['id']."".""); 
?>"><?php echo $this->_var['lang']['suppot']; ?><?php echo $this->_var['lang']['project']; ?></a></li>
			
		</ul>
	</div>

	<div class="blank"></div>
	<div class="blank"></div>
	<div id="pin_box">
	<?php echo $this->fetch('inc/deal_list.html'); ?>
	</div>	
	<div class="blank"></div>
	<div id="pin_loading" rel="<?php
echo parse_url_tag("u:ajax#homesupport|"."id=".$this->_var['home_user_info']['id']."&p=".$this->_var['current_page']."".""); 
?>"><?php echo $this->_var['lang']['InfoStatus3']; ?></div>	
	<div class="pages"><?php echo $this->_var['pages']; ?></div>
</div>
<?php echo $this->fetch('inc/footer.html'); ?> 