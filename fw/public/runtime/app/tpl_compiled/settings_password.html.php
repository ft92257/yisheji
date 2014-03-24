<?php echo $this->fetch('inc/header.html'); ?> 

<div class="blank"></div>

<div class="shadow_bg">
	<div class="wrap white_box"">
		<div class="page_title">
			<?php echo $this->_var['lang']['changePass']; ?>
		</div>
		<div class="switch_nav">
			<ul>
				<li><a href="<?php
echo parse_url_tag("u:settings#index|"."".""); 
?>"><?php echo $this->_var['lang']['userInfo']; ?></a></li>
				<li class="current"><a href="<?php
echo parse_url_tag("u:settings#password|"."".""); 
?>"><?php echo $this->_var['lang']['changePass']; ?></a></li>
				<li><a href="<?php
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
		
		<div class="left">
			<form class="ajax_form" action="<?php
echo parse_url_tag("u:settings#save_password|"."".""); 
?>">
									
				<div class="form_row">
					<div class="blank15"></div>
					<label class="title w100"><?php echo $this->_var['lang']['newPass']; ?>:</label>
					<input type="password" value="" class="textbox" name="user_pwd" />
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100"><?php echo $this->_var['lang']['password1']; ?>:</label>
					<input type="password" value="" class="textbox" name="confirm_user_pwd" />
					<div class="blank15"></div>
				</div>
				
				
				<div class="submit_btn_row">
					<div class="ui-button green" rel="green">
						<div>
							<span><?php echo $this->_var['lang']['save']; ?><?php echo $this->_var['lang']['password3']; ?></span>
						</div>
					</div>
					<input type="hidden" value="1" name="ajax" />
					<div class="blank15"></div>
				</div>
				
			</form>
		</div><!--left-->
		
		
		<div class="blank"></div>
		
	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 