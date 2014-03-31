<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/account.css";
?>
<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['dpagecss'],
);
echo $k['name']($k['v']);
?>" />
<div class="blank"></div>

<div class="shadow_bg">
	<div class="wrap white_box"">
		<div class="page_title">
			<?php echo $this->_var['lang']['recharge']; ?>
		</div>
		
		<div class="switch_nav" style="height:1px;"></div>
		
		<div class="blank"></div>
		
		<div class="full">
			
			<form class="ajax_form" action="<?php
echo parse_url_tag("u:account#do_incharge|"."".""); 
?>">
									
				<div class="form_row">
					<div class="blank15"></div>
					<label class="title w100"><?php echo $this->_var['lang']['recharge']; ?><?php echo $this->_var['lang']['amount']; ?>:</label>
					<input type="text" class="textbox" value="" name="money" />
					<div class="title w100"><?php echo $this->_var['lang']['RMB']; ?>(<?php echo $this->_var['lang']['yuan']; ?>)</div>
					<div class="blank15"></div>
				</div>
				
				
				
				<div class="submit_btn_row">
					<div class="ui-button green" rel="green">
						<div>
							<span><?php echo $this->_var['lang']['InfoPay3']; ?></span>
						</div>
					</div>					
					<a href="<?php
echo parse_url_tag("u:account#index|"."".""); 
?>" class="cancel_incharge"><?php echo $this->_var['lang']['cancle']; ?><?php echo $this->_var['lang']['recharge']; ?></a>
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