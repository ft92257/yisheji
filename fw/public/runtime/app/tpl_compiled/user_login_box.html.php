<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/ajax_user_login.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/ajax_user_login.js";
?>
<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['dpagejs'],
  'c' => $this->_var['dcpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>

<div class="signlogin_box">
			<div class="left">
				
				<div class="link_dash f25">
					<?php echo $this->_var['lang']['login']; ?>
				</div>
				<form id="user_login_form" name="user_login_form" action="<?php
echo parse_url_tag("u:user#do_login|"."".""); 
?>">
					
				<div class="form_row">
					<div class="blank15"></div>
					<label class="title"><font>*&nbsp;&nbsp;</font><?php echo $this->_var['lang']['username_1']; ?>:</label>
					<input type="text" value="<?php echo $this->_var['lang']['eoru']; ?>" class="textbox" name="email"/>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title"><font>*&nbsp;&nbsp;</font><?php echo $this->_var['lang']['pwd']; ?>:</label>
					<input type="password" name="user_pwd"  class="textbox" />
					<span class="getpassword"><a href="<?php
echo parse_url_tag("u:user#getpassword|"."".""); 
?>"><?php echo $this->_var['lang']['forgetpwd']; ?>？</a></span>
					<div class="blank15"></div>
				</div>
				<div class="form_row auto_login">
					<input type="checkbox" value="1" name="auto_login" checked="checked" /> 
					<label class="auto_login_tip"><?php echo $this->_var['lang']['autologin']; ?></label>
					<div class="blank15"></div>
				</div>
				
				<div class="button_row do_login">
					<input type="button" value="<?php echo $this->_var['lang']['login']; ?>" name="submit_form" class="btn_do_login" id="btn_do_login" />
					<input type="hidden" value="1" name="ajax" />
					<div class="blank15"></div>
				</div>
				
				</form>
			</div>
			
			<div class="right">
				<div class="link_dash f16">
					<?php echo $this->_var['lang']['ql']; ?>				
				</div>		
				<div class="blank"></div>		
				<?php 
$k = array (
  'name' => 'api_login',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
				<span class="no_account_tip"><?php echo $this->_var['lang']['nouser']; ?></span>
				<a href="<?php
echo parse_url_tag("u:user#register|"."".""); 
?>" class="btn_go_register" title="<?php echo $this->_var['lang']['register']; ?>"><?php echo $this->_var['lang']['register']; ?></a>
				
			</div>
			<div class="blank"></div>
			
		</div>