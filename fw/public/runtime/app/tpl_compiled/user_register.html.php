<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/user_register.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/user_register.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/user_register.js";
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
	<div class="wrap white_box">
		<div class="signlogin_box">
			<div class="left">
				
				<div class="link_dash f25">
					<?php echo $this->_var['lang']['register']; ?></a>
				</div>
				<form id="user_register_form" name="user_register_form" action="<?php
echo parse_url_tag("u:user#do_register|"."".""); 
?>">
					
				<div class="form_row">
					<div class="blank15"></div>
					<label class="title"><font>*&nbsp;&nbsp;</font><?php echo $this->_var['lang']['email']; ?>:</label>
					<input type="text" value="<?php echo $this->_var['lang']['email']; ?>" class="textbox" name="email"/>
					<div class="tip_box"></div>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title"><font>*&nbsp;&nbsp;</font><?php echo $this->_var['lang']['password']; ?>:</label>
					<input type="password" name="user_pwd"  class="textbox" />
					<div class="tip_box"></div>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title"><font>*&nbsp;&nbsp;</font><?php echo $this->_var['lang']['password1']; ?>:</label>
					<input type="password" name="confirm_user_pwd"  class="textbox" />
					<div class="tip_box"></div>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title"><font>*&nbsp;&nbsp;</font><?php echo $this->_var['lang']['username']; ?>:</label>
					<input type="text" value="" class="textbox" name="user_name"/>
					<div class="tip_box"></div>
					<div class="blank15"></div>
				</div>
				
				<div class="button_row term">
					<span><a href="<?php
echo parse_url_tag("u:help#term|"."".""); 
?>"><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SITE_NAME',
);
echo $k['name']($k['v']);
?><?php echo $this->_var['lang']['TermOfService']; ?></a></span>
					<div class="blank15"></div>
				</div>
				
				<div class="button_row do_register">
					<input type="button" name="submit_form" class="btn_do_register" id="btn_do_register" value="<?php echo $this->_var['lang']['register']; ?>" />
					<input type="hidden" value="1" name="ajax" />
					<div class="blank15"></div>
				</div>
				
				</form>
			</div>
			
			<div class="right">
				<div class="link_dash f16">
					<?php echo $this->_var['lang']['InfoReg1']; ?></div>		
				<div class="blank"></div>		
				<?php 
$k = array (
  'name' => 'api_login',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
				<span class="no_account_tip"><?php echo $this->_var['lang']['hadAccount']; ?></span>
				<a href="<?php
echo parse_url_tag("u:user#login|"."".""); 
?>" class="btn_go_login" title="<?php echo $this->_var['lang']['immediately']; ?><?php echo $this->_var['lang']['login']; ?>"><?php echo $this->_var['lang']['immediately']; ?><?php echo $this->_var['lang']['login']; ?></a>
				
			</div>
			<div class="blank"></div>
			
		</div>
	</div>
</div>

<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 


