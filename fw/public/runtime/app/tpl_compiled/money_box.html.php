<div class="money_box">
			<div class="credit_box"><?php echo $this->_var['lang']['ey']; ?> <span class="price"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['user_info']['money'],
  'p' => '2',
);
echo $k['name']($k['v'],$k['p']);
?></span> <?php echo $this->_var['lang']['RMB']; ?></div>
			<div class="blank"></div>
			<div class="incharge_tip"><?php echo $this->_var['lang']['payfor']; ?><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SITE_NAME',
);
echo $k['name']($k['v']);
?>，<?php echo $this->_var['lang']['fbzc']; ?>
			 <a href="<?php
echo parse_url_tag("u:account#incharge|"."".""); 
?>"><?php echo $this->_var['lang']['pay']; ?></a>&nbsp;
			 <?php if ($this->_var['user_info']['money'] > 0): ?>
			 <a href="<?php
echo parse_url_tag("u:account#refund|"."".""); 
?>"><?php echo $this->_var['lang']['tx']; ?></a>
			 <?php endif; ?>
			</div>
</div>