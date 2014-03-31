<div class="deal_right_info">
<div class="info-box">
  <p class="status"><?php echo $this->_var['lang']['cded']; ?></p>
  <p class="money"><b>￥</b><?php echo $this->_var['deal_info']['support_amount_format']; ?></p>
  <div class="sidebar-percentage">
<span class="sidebar-percentage-progress-span"><?php echo $this->_var['deal_info']['percent']; ?>%</span>
<div style="width:<?php echo $this->_var['deal_info']['percent']; ?>%;" class="sidebar-percentage-progress"></div>
<div class="stautstext"  style="<?php if ($this->_var['deal_info']['is_success']): ?> background:#5fb760     <?php elseif ($this->_var['deal_info']['end_time'] > $this->_var['now']): ?>   background:#428bca   <?php else: ?>  background:#999999<?php endif; ?>"><?php if ($this->_var['deal_info']['is_success']): ?><span"><?php echo $this->_var['lang']['success']; ?></span> <?php elseif ($this->_var['deal_info']['end_time'] > $this->_var['now']): ?><span style=""><?php echo $this->_var['lang']['ing']; ?></span><?php else: ?><span style=" "><?php echo $this->_var['lang']['failure']; ?> </span> <?php endif; ?></div>
</div>
  <div class="sidebar-number-days">
  <div class="sidebar-number-days-l"><?php echo $this->_var['deal_info']['support_count']; ?><strong><?php echo $this->_var['lang']['countpersion']; ?></strong></div>
  <div class="sidebar-number-days-m"><?php echo $this->_var['deal_info']['comment_count']; ?><strong><?php echo $this->_var['lang']['reply']; ?></strong></div>
  <div class="sidebar-number-days-r"><?php if ($this->_var['deal_info']['remain_days'] < 0): ?><?php echo $this->_var['lang']['ended']; ?><?php else: ?><?php echo $this->_var['deal_info']['remain_days']; ?><?php echo $this->_var['lang']['days']; ?><?php endif; ?><strong><?php echo $this->_var['lang']['endtime']; ?></strong></div>
  
</div>
</div>








<div class="deal_tip_box" style="border:#E3E3E3 1px solid;border-top:none">
<?php if ($this->_var['deal_info']['begin_time'] > $this->_var['now']): ?>
<div class="deal_tip gray_tip">
	<div>
		<?php echo $this->_var['lang']['timecassic']; ?><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_info']['begin_time'],
  'f' => 'Y年m月d日H:i',
);
echo $k['name']($k['v'],$k['f']);
?><?php echo $this->_var['lang']['at']; ?>，
		<?php if ($this->_var['deal_info']['end_time'] != 0): ?>
		<?php echo $this->_var['lang']['atmust']; ?><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_info']['end_time'],
  'f' => 'Y年m月d日H:i',
);
echo $k['name']($k['v'],$k['f']);
?><?php echo $this->_var['lang']['zq']; ?> ¥<?php echo $this->_var['deal_info']['limit_price_format']; ?> <?php echo $this->_var['lang']['mb']; ?>
		<?php else: ?>
		<?php echo $this->_var['lang']['atmust']; ?> ¥<?php echo $this->_var['deal_info']['limit_price_format']; ?>  <?php echo $this->_var['lang']['mb']; ?>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<?php if ($this->_var['deal_info']['end_time'] < $this->_var['now'] && $this->_var['deal_info']['end_time'] != 0): ?>
<div class="deal_tip gray_tip">
	<div>
		<?php echo $this->_var['lang']['timecassic']; ?><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_info']['end_time'],
  'f' => 'Y年m月d日H:i',
);
echo $k['name']($k['v'],$k['f']);
?><?php echo $this->_var['lang']['ended']; ?>，
		<?php if ($this->_var['deal_info']['is_success'] == 0): ?>
		<?php echo $this->_var['lang']['wd']; ?> ¥<?php echo $this->_var['deal_info']['limit_price_format']; ?> <?php echo $this->_var['lang']['dmb']; ?>。
		<?php else: ?>
		<?php echo $this->_var['lang']['successd']; ?> ¥<?php echo $this->_var['deal_info']['support_amount_format']; ?>。
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>

<?php if (( $this->_var['deal_info']['end_time'] > $this->_var['now'] || $this->_var['deal_info']['end_time'] == 0 ) && $this->_var['deal_info']['begin_time'] < $this->_var['now']): ?>
<div class="deal_tip green_tip">
	<div>
		<?php if ($this->_var['deal_info']['end_time'] == 0): ?>
		此项目必须达到 ¥<?php echo $this->_var['deal_info']['limit_price_format']; ?> 的目标，方可成功。
		<?php else: ?>
		此项目必须在<?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_info']['end_time'],
  'f' => 'Y年m月d日H:i',
);
echo $k['name']($k['v'],$k['f']);
?>之前，			
		达到 ¥<?php echo $this->_var['deal_info']['limit_price_format']; ?> 的目标。	
		<?php endif; ?>			
	</div>
</div>
<?php endif; ?>
</div><!--end deal_tip_box-->







<?php if ($this->_var['deal_user_info']): ?>
<div class="deal_user_box">
<div class="deal_user_title"><?php echo $this->_var['lang']['xuser']; ?></div>
<div class="deal_user_avatar">
<?php 
$k = array (
  'name' => 'show_avatar',
  'p' => $this->_var['deal_user_info']['id'],
);
echo $k['name']($k['p']);
?>
</div>
<div class="deal_user_info">
	<div class="deal_user_name"><?php echo $this->_var['deal_user_info']['user_name']; ?></div>
	<div class="deal_login_time"><?php echo $this->_var['lang']['lastlogin']; ?>:<?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['deal_user_info']['login_time'],
  'f' => 'Y/m/d',
);
echo $k['name']($k['v'],$k['f']);
?></div>
	<?php if ($this->_var['deal_user_info']['province'] != '' || $this->_var['deal_user_info']['city'] != ''): ?>
	<div class="deal_user_loc"><?php echo $this->_var['deal_user_info']['province']; ?><?php echo $this->_var['deal_user_info']['city']; ?></div>
	<?php endif; ?>
	
	<div class="author_row" style="padding:0px; color:#690;">	
		<span onclick="send_message(<?php echo $this->_var['deal_user_info']['id']; ?>);" class="send_message" style="margin-left:0px;"></span>				
		<span style="font-size:12px; padding-left:5px;"><?php echo $this->_var['lang']['postpm']; ?></span>										
	</div>
</div>
<div class='blank'></div>
<?php 
$k = array (
  'name' => 'nl2br',
  'v' => $this->_var['deal_user_info']['intro'],
);
echo $k['name']($k['v']);
?>
<div class='blank'></div>
<div class="user_weibo_list">
<?php $_from = $this->_var['deal_user_info']['weibo_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'weibo');if (count($_from)):
    foreach ($_from AS $this->_var['weibo']):
?>
<a href="<?php echo $this->_var['weibo']['weibo_url']; ?>" target="_blank"><?php echo $this->_var['weibo']['weibo_url']; ?></a>
<div class="blank1"></div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
<?php endif; ?>






<div class="deal_item_list">
	<?php $_from = $this->_var['deal_item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'deal_item');if (count($_from)):
    foreach ($_from AS $this->_var['deal_item']):
?>
	<div class="deal_item">
		<div class="deal_item_price"><?php echo $this->_var['lang']['zc']; ?> ¥<?php echo $this->_var['deal_item']['price_format']; ?></div>	
		<div class="deal_item_support_count"><?php echo $this->_var['deal_item']['support_count']; ?>位支持者</div>
		<div class="deal_item_description"><?php 
$k = array (
  'name' => 'nl2br',
  'v' => $this->_var['deal_item']['description'],
);
echo $k['name']($k['v']);
?></div>	
		<div class="deal_item_delivery_limit">
			<?php if ($this->_var['deal_item']['is_delivery'] == 1): ?>
				<?php if ($this->_var['deal_item']['delivery_fee'] == 0): ?>
				<?php echo $this->_var['lang']['yf']; ?>：<?php echo $this->_var['lang']['by']; ?>
				<?php else: ?>
				<?php echo $this->_var['lang']['yf']; ?>：¥<?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_item']['delivery_fee'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?>
				<?php endif; ?>
				&nbsp;&nbsp;
			<?php endif; ?>
			
			<?php if ($this->_var['deal_item']['is_limit_user'] == 1): ?>
				<?php if ($this->_var['deal_item']['limit_user'] > 0): ?>
				<?php echo $this->_var['lang']['xe']; ?>：<?php echo $this->_var['deal_item']['limit_user']; ?>位
				<?php endif; ?>
			<?php endif; ?>
		</div>	
		
		<?php if ($this->_var['deal_item']['images']): ?>
		<div class="blank1"></div>	
		<div class="deal_item_images">				
			<?php $_from = $this->_var['deal_item']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image');if (count($_from)):
    foreach ($_from AS $this->_var['image']):
?>
			<div class="image_item">
				<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image']['image'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" rel="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image']['image'],
  'w' => '570',
  'h' => '430',
);
echo $k['name']($k['v'],$k['w'],$k['h']);
?>" width=50 height=50 />
			</div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</div>	
		<div class="blank1"></div>					
		<?php endif; ?>
		
		<div class="deal_item_repaid">
			<?php if ($this->_var['deal_item']['repaid_day'] > 0): ?>
			<?php echo $this->_var['lang']['yjhb']; ?>：<?php echo $this->_var['lang']['xmsuccess']; ?><?php echo $this->_var['deal_item']['repaid_day']; ?><?php echo $this->_var['lang']['daysa']; ?>
			<?php endif; ?>
		</div>
		<div class="blank"></div>
		<?php if (( $this->_var['deal_info']['end_time'] > $this->_var['now'] || $this->_var['deal_info']['end_time'] == 0 ) && $this->_var['deal_info']['begin_time'] < $this->_var['now'] && $this->_var['deal_info']['is_effect'] == 1): ?>
			<?php if ($this->_var['deal_item']['support_count'] < $this->_var['deal_item']['limit_user'] || $this->_var['deal_item']['limit_user'] == 0): ?>
			<div class="ui-button green buy_deal_item" rel="green" url="<?php
echo parse_url_tag("u:cart|"."id=".$this->_var['deal_item']['id']."".""); 
?>">
				<div>
					<span><?php echo $this->_var['lang']['zc']; ?> ¥<?php echo $this->_var['deal_item']['price_format']; ?></span>
				</div>
			</div>
			<?php else: ?>
			<div class="ui-button gray" rel="gray" >
				<div>
					<span>已满额</span>
				</div>
			</div>
			<?php endif; ?>
		<?php else: ?>
		<div class="ui-button gray" rel="gray">
			<div>
				<span><?php echo $this->_var['lang']['zc']; ?> ¥<?php echo $this->_var['deal_item']['price_format']; ?></span>
			</div>
		</div>
		<?php endif; ?>
		<div class="blank"></div>
		
	</div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
<div class="blank"></div>

