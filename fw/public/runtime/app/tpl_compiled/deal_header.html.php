<div class="fwtitle">
   <div class="title_page">
      <h2><?php echo $this->_var['deal_info']['name']; ?></h2>
     <!-- <span>作者：</span>
	  <?php if ($this->_var['deal_info']['user_id'] != 0): ?>
	  <span><a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['deal_info']['user_id']."".""); 
?>"><?php echo $this->_var['deal_info']['user_name']; ?></a></span>
	  <span onclick="send_message(<?php echo $this->_var['deal_info']['user_id']; ?>);" class="send_message"></span>
	  <?php else: ?><span><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SITE_NAME',
);
echo $k['name']($k['v']);
?></span>
	  <?php endif; ?> -->
      
     <div class="nav-uls"> 
       <ul>
		<li <?php if (ACTION_NAME == 'show'): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_info']['id']."".""); 
?>"><?php echo $this->_var['lang']['cassicindex']; ?></a></li>
		<li <?php if (ACTION_NAME == 'update' || ACTION_NAME == 'updatedetail'): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deal#update|"."id=".$this->_var['deal_info']['id']."".""); 
?>"><?php echo $this->_var['lang']['feed']; ?><span><?php echo $this->_var['deal_info']['log_count']; ?></span></a></li>
		<li <?php if (ACTION_NAME == 'support'): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deal#support|"."id=".$this->_var['deal_info']['id']."".""); 
?>"><?php echo $this->_var['lang']['zuser']; ?><span><?php echo $this->_var['deal_info']['support_count']; ?></span></a></li>
		<li <?php if (ACTION_NAME == 'comment'): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deal#comment|"."id=".$this->_var['deal_info']['id']."".""); 
?>"><?php echo $this->_var['lang']['reply']; ?><span><?php echo $this->_var['deal_info']['comment_count']; ?></span></a></li>				
	  </ul>
     </div>
      
      	<?php if ($this->_var['is_focus']): ?>
	<div class="ui-button gray focus_deal" rel="gray" id="<?php echo $this->_var['deal_info']['id']; ?>">
		<div>
			<span><?php echo $this->_var['lang']['nofollower']; ?></span>
		</div>
	</div>
	<?php else: ?>
	<div class="ui-button blue focus_deal" rel="blue" id="<?php echo $this->_var['deal_info']['id']; ?>">
		<div>
			<span><?php echo $this->_var['lang']['follower']; ?></span>
		</div>
	</div>
	<?php endif; ?>
   </div>
</div>
<div class="blank"></div>
<div class="blank"></div>		
