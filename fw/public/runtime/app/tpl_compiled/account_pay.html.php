<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/account.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/go_pay.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/go_pay.js";
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
			<div class="credit_box"><?php echo $this->_var['lang']['recharge']; ?> <span class="price"><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['money'],
  'p' => '2',
);
echo $k['name']($k['v'],$k['p']);
?></span> <?php echo $this->_var['lang']['yuan']; ?></div>
		</div>
		
		<div class="switch_nav" style="height:1px;"></div>
		
		<div class="blank"></div>
		
		<div class="full" style="padding:30px;">
			
			<form class="pay_form" action="<?php
echo parse_url_tag("u:account#go_pay|"."".""); 
?>" target="_blank">
									
				
				<?php echo $this->_var['payment_html']; ?>
				
				<div class="blank"></div>
				<div>
					<div class="ui-button green" rel="green">
						<div>
							<span><?php echo $this->_var['lang']['InfoPay3']; ?></span>
						</div>
					</div>				
					<input type="hidden" id="back_url" value="<?php
echo parse_url_tag("u:account|"."".""); 
?>" />	
					<input type="hidden" value="<?php echo $this->_var['money']; ?>" name="money" />
					<input type="hidden" value="1" name="ajax" />					
					<div class="blank15"></div>
				</div>
				
			</form>
			
		</div><!--full-->
		
		
		<div class="blank"></div>
		
	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 