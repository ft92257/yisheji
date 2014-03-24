<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/consignee.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/consignee.js";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/consignee.css";
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
<div class="blank"></div>

<div class="shadow_bg">
	<div class="wrap white_box"">
		<div class="page_title">
			<?php echo $this->_var['lang']['postAdd']; ?>
		</div>
		<div class="switch_nav">
			<ul>
				<li><a href="<?php
echo parse_url_tag("u:settings#index|"."".""); 
?>"><?php echo $this->_var['lang']['userInfo']; ?></a></li>
				<li><a href="<?php
echo parse_url_tag("u:settings#password|"."".""); 
?>"><?php echo $this->_var['lang']['changePass']; ?></a></li>
				<li class="current"><a href="<?php
echo parse_url_tag("u:settings#consignee|"."".""); 
?>"><?php echo $this->_var['lang']['postAdd']; ?></a></li>
				<li><a href="<?php
echo parse_url_tag("u:settings#bind|"."".""); 
?>"><?php echo $this->_var['lang']['bangSet']; ?></a></li>
				<?php if ($this->_var['user_info']['ex_real_name'] == '' && $this->_var['user_info']['ex_account_info'] == '' && $this->_var['user_info']['ex_contact'] == ''): ?>
				<li><a href="<?php
echo parse_url_tag("u:settings#bank|"."".""); 
?>"><?php echo $this->_var['lang']['bankAccount']; ?></a></li>
				<?php endif; ?>
			</ul>
		</div>
		
		<div class="blank"></div>
		
		<div class="full">
				
				<div class="ui-button green" rel="green" id="add_consignee" url="<?php
echo parse_url_tag("u:settings#add_consignee|"."".""); 
?>">
						<div>
							<span><?php echo $this->_var['lang']['add']; ?><?php echo $this->_var['lang']['postAdd']; ?></span>
						</div>
				</div>
				
				<div class="blank15"></div>
				
				<?php if ($this->_var['consignee_list']): ?>
					<?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'consignee_item');if (count($_from)):
    foreach ($_from AS $this->_var['consignee_item']):
?>
					<div class="consignee_row">
						<div class="consignee_item">
						<?php echo $this->_var['consignee_item']['province']; ?><?php echo $this->_var['consignee_item']['city']; ?> <?php echo $this->_var['consignee_item']['address']; ?> <?php echo $this->_var['consignee_item']['zip']; ?>
						<?php echo $this->_var['consignee_item']['consignee']; ?> <?php echo $this->_var['consignee_item']['mobile']; ?>
						</div>
						<div class="consignee_op">
							<a href="javascript:void(0);" class="edit_consignee" rel="<?php echo $this->_var['consignee_item']['id']; ?>"><?php echo $this->_var['lang']['modify']; ?></a>
							<a href="javascript:void(0);" class="del_consignee" rel="<?php echo $this->_var['consignee_item']['id']; ?>"><?php echo $this->_var['lang']['delete']; ?></a>
						</div>
					</div>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<?php else: ?>
				<div class="empty_tip">
					<?php echo $this->_var['lang']['InfoStatus2']; ?><?php echo $this->_var['lang']['postAdd']; ?>
				</div>			
				<?php endif; ?>
		</div><!--full-->
		
		
		<div class="blank"></div>
		
	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 