<div class="user_info_row">
	<div class="wrap">
		<div class="home_user_avatar"><?php 
$k = array (
  'name' => 'show_avatar',
  'p' => $this->_var['home_user_info']['id'],
  't' => 'big',
);
echo $k['name']($k['p'],$k['t']);
?></div>
		<div class="home_user_info">
			<div class="home_user_name"><?php echo $this->_var['home_user_info']['user_name']; ?></div>
			<div class="home_message">				
				<span onclick="send_message(<?php echo $this->_var['home_user_info']['id']; ?>);" class="send_message f_l" style="height:20px; background-position:0px 5px;"></span>				
				<a class="f_l linkgreen" href="javascript:void(0);" style="font-size:12px; margin-left:5px;"  onclick="send_message(<?php echo $this->_var['home_user_info']['id']; ?>);"><?php echo $this->_var['lang']['postpm']; ?></a>	
				<div class="blank1"></div>
			</div>
			<div class="home_user_join">
				<?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['home_user_info']['create_time'],
  'f' => 'Y年m月d日',
);
echo $k['name']($k['v'],$k['f']);
?> <?php echo $this->_var['lang']['join']; ?> <?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SITE_NAME',
);
echo $k['name']($k['v']);
?>
			</div>
			<?php if ($this->_var['home_user_info']['intro'] != ''): ?>
			<div class="home_user_desc">
				<?php echo $this->_var['home_user_info']['intro']; ?>
			</div>
			<?php endif; ?>
			<div class="home_user_weibo">
				<div class="title"><?php echo $this->_var['lang']['blogorweibo']; ?></div>
				<ul>
					<?php $_from = $this->_var['home_user_info']['weibo_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'weibo_item');if (count($_from)):
    foreach ($_from AS $this->_var['weibo_item']):
?>
					<li><a href="<?php echo $this->_var['weibo_item']['weibo_url']; ?>" target="_blank" class="linkgreen"><?php echo $this->_var['weibo_item']['weibo_url']; ?></a></li>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
			</div>
		</div>
		<div class="blank1"></div>
	</div>
</div>