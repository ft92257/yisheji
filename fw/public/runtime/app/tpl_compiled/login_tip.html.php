<div class="login"><?php if ($this->_var['user_info']): ?>
	<a class="a" href="#" id="mymessage"><?php echo $this->_var['lang']['pm']; ?></a>|
	<a class="a" href="#" id="mycenter"><?php echo $this->_var['user_info']['user_name']; ?></a>|
	<a class="a" href="../index.php?s=/User/logout" title="<?php echo $this->_var['lang']['logout']; ?>" ><?php echo $this->_var['lang']['logout']; ?></a>
	<?php if ($this->_var['langs'] == 'eng'): ?>
<a class="a" href="<?php echo $this->_var['url']; ?>" title="简体中文"  style="position:relative;top:1px">CN</a>
<?php else: ?>
<a class="a" href="<?php echo $this->_var['url']; ?>"  title="Englist" style="position:relative;top:1px">EN</a>
<?php endif; ?>

	<?php if ($this->_var['USER_NOTIFY_COUNT'] > 0 || $this->_var['USER_MESSAGE_COUNT'] > 0): ?>
	<?php if ($this->_var['HIDE_USER_NOTIFY'] == 0): ?>
	<div id="user_notify_tip" style="position:absolute; z-index:1; display:none;">		
		<div class="notify_tip_box" id="close_user_notify">
			<div class="close_user_notify"></div>
			<?php if ($this->_var['USER_NOTIFY_COUNT'] > 0): ?>
			<span><a class="a" href="<?php
echo parse_url_tag("u:notify|"."".""); 
?>"><?php echo $this->_var['lang']['youhave']; ?> <font><?php echo $this->_var['USER_NOTIFY_COUNT']; ?></font> <?php echo $this->_var['lang']['counttz']; ?></a></span>
			<?php endif; ?>
			<?php if ($this->_var['USER_MESSAGE_COUNT'] > 0): ?>
			<span><a class="a" href="<?php
echo parse_url_tag("u:message|"."".""); 
?>"><?php echo $this->_var['lang']['youhave']; ?> <font><?php echo $this->_var['USER_MESSAGE_COUNT']; ?></font> <?php echo $this->_var['lang']['newpm']; ?></a></span>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php endif; ?>

	<div id="mymessage_drop" style="position:absolute; display:none;">
		<div class="drop_box">
			<span><a class="a" href="<?php
echo parse_url_tag("u:news#fav|"."".""); 
?>"><?php echo $this->_var['lang']['ffeed']; ?></a></span>
			<span><a class="a" href="<?php
echo parse_url_tag("u:comment|"."".""); 
?>"><?php echo $this->_var['lang']['lookcoment']; ?></a></span>
			<span><a class="a" href="<?php
echo parse_url_tag("u:message|"."".""); 
?>"><?php echo $this->_var['lang']['lookpm']; ?></a></span>
			<span><a class="a" href="<?php
echo parse_url_tag("u:notify|"."".""); 
?>"><?php echo $this->_var['lang']['au']; ?></a></span>

		</div>
	</div>
	<div id="mycenter_drop" style="position:absolute; display:none;">
		<div class="drop_box">
			<span><a class="a" href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['user_info']['id']."".""); 
?>"><?php echo $this->_var['lang']['myhome']; ?></a></span>
			<span><a class="a" href="<?php
echo parse_url_tag("u:account|"."".""); 
?>"><?php echo $this->_var['lang']['admincp']; ?></a></span>
			<span><a class="a" href="<?php
echo parse_url_tag("u:settings|"."".""); 
?>"><?php echo $this->_var['lang']['spacecp']; ?></a></span>

		</div>
	</div>
	
<?php else: ?>
 <div style="position:relative;">	
	<a class="a" href="../index.php?s=/User/register" title="<?php echo $this->_var['lang']['register']; ?>" ><?php echo $this->_var['lang']['register']; ?></a>|
	<a class="a" href="../index.php?s=/User/login" title="<?php echo $this->_var['lang']['login']; ?>" style="margin-right:100px;"><?php echo $this->_var['lang']['login']; ?></a>
   
    <div class="otherlogin" style="margin-right:0px;">	
	<?php echo $this->_var['api_login']; ?>
    <?php if ($this->_var['langs'] == 'eng'): ?>
<a class="a" href="<?php echo $this->_var['url']; ?>" title="简体中文" style="position:relative;top:-5px">CN</a>
<?php else: ?>
<a class="a" href="<?php echo $this->_var['url']; ?>"  title="Englist"  style="position:relative;top:-5px">EN</a>
<?php endif; ?>

    </div>
    </div>
<?php endif; ?>

</div>
<script>
function jump(to,obj){
	 if(to==1){
		 window.location.href=window.location.href+'&lang=eng';
	 }else{
		 window.location.href=window.location.href;
	 }
}
</script>
