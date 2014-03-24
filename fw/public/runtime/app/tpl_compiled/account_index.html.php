<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/order_list.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/order_list.js";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/account.css";
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
			<?php echo $this->_var['lang']['suppot']; ?><?php echo $this->_var['lang']['project']; ?>
		</div>
		<div class="switch_nav">
			<ul>
				<li class="current"><a href="<?php
echo parse_url_tag("u:account#index|"."".""); 
?>"><?php echo $this->_var['lang']['suppot']; ?><?php echo $this->_var['lang']['project']; ?></a></li>
				<li><a href="<?php
echo parse_url_tag("u:account#project|"."".""); 
?>"><?php echo $this->_var['lang']['my']; ?><?php echo $this->_var['lang']['project']; ?></a></li>
				<li><a href="<?php
echo parse_url_tag("u:account#focus|"."".""); 
?>"><?php echo $this->_var['lang']['attention']; ?><?php echo $this->_var['lang']['project']; ?></a></li>
				<li><a href="<?php
echo parse_url_tag("u:account#credit|"."".""); 
?>"><?php echo $this->_var['lang']['payDetail']; ?></a></li>
				
			</ul>
		</div>
		
		<div class="blank"></div>
		
		<?php echo $this->fetch('inc/money_box.html'); ?> 
		
		<div class="full">
		<?php if ($this->_var['order_list']): ?>
		<table class="data-table">
			<tr>
				<th><?php echo $this->_var['lang']['project']; ?><?php echo $this->_var['lang']['name']; ?></th>
				<th width="50"><?php echo $this->_var['lang']['amount']; ?></th>
				<th width="50"><?php echo $this->_var['lang']['freight']; ?></th>
				<th width="120"><?php echo $this->_var['lang']['status']; ?></th>
				<th width="120"><?php echo $this->_var['lang']['operation']; ?></th>
			</tr>
			<?php $_from = $this->_var['order_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order_item');if (count($_from)):
    foreach ($_from AS $this->_var['order_item']):
?>
			<tr>
				<td class="deal_name">
				<?php if ($this->_var['order_item']['deal_info']): ?>
					<div><a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['order_item']['deal_id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['order_item']['deal_name']; ?>"><img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['order_item']['deal_info']['image'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"  alt="<?php echo $this->_var['order_item']['deal_name']; ?>"/></a></div>	
					<div><a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['order_item']['deal_id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['order_item']['deal_name']; ?>"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['order_item']['deal_name'],
  'b' => '0',
  'e' => '25',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></a></div>	
				<?php else: ?>
					<div><span title="<?php echo $this->_var['order_item']['deal_name']; ?>"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['order_item']['deal_name'],
  'b' => '0',
  'e' => '25',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></span></div>	
				<?php endif; ?>
				</td>
				<td>
					<?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['order_item']['deal_price'],
);
echo $k['name']($k['v']);
?>
				</td>
				<td>
					<?php if ($this->_var['order_item']['delivery_fee'] == 0): ?>
					--
					<?php else: ?>
					<?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['order_item']['delivery_fee'],
);
echo $k['name']($k['v']);
?>
					<?php endif; ?>
				</td>
				<td>			
					<?php if ($this->_var['order_item']['order_status'] == 0): ?>
					<?php echo $this->_var['lang']['InfoPay6']; ?><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['order_item']['credit_pay'],
);
echo $k['name']($k['v']);
?><br /><?php echo $this->_var['lang']['rest']; ?><?php echo $this->_var['lang']['InfoPay7']; ?>
					<?php else: ?>		
					<?php if ($this->_var['order_item']['deal_info']): ?>
				
							<?php if ($this->_var['order_item']['deal_info']['is_success'] == 1): ?>
								<?php if ($this->_var['order_item']['deal_info']['begin_time'] > $this->_var['now']): ?><?php echo $this->_var['lang']['notStart']; ?><?php endif; ?>
								<?php if ($this->_var['order_item']['deal_info']['end_time'] < $this->_var['now'] && $this->_var['order_item']['deal_info']['end_time'] != 0): ?><?php echo $this->_var['lang']['success2']; ?>&nbsp;<?php if ($this->_var['order_item']['repay_time'] > 0): ?><?php echo $this->_var['lang']['redound']; ?><?php echo $this->_var['lang']['granted']; ?><?php else: ?><?php echo $this->_var['lang']['granting']; ?><?php echo $this->_var['lang']['redound']; ?><?php endif; ?><?php endif; ?>
								<?php if ($this->_var['order_item']['deal_info']['begin_time'] < $this->_var['now'] && ( $this->_var['order_item']['deal_info']['end_time'] > $this->_var['now'] || $this->_var['order_item']['deal_info']['end_time'] == 0 )): ?><?php echo $this->_var['lang']['success2']; ?>&nbsp;<?php if ($this->_var['order_item']['repay_time'] > 0): ?><?php echo $this->_var['lang']['redound']; ?><?php echo $this->_var['lang']['granted']; ?><?php else: ?><?php echo $this->_var['lang']['granting']; ?><?php echo $this->_var['lang']['redound']; ?><?php endif; ?><?php endif; ?>
							<?php else: ?>
								<?php if ($this->_var['order_item']['deal_info']['begin_time'] > $this->_var['now']): ?><?php echo $this->_var['lang']['notStart']; ?><?php endif; ?>
								<?php if ($this->_var['order_item']['deal_info']['end_time'] < $this->_var['now'] && $this->_var['order_item']['deal_info']['end_time'] != 0): ?><?php echo $this->_var['lang']['failure']; ?>&nbsp;<?php if ($this->_var['order_item']['is_refund'] == 1): ?><?php echo $this->_var['lang']['refunded']; ?><?php else: ?><?php echo $this->_var['lang']['refunding']; ?><?php endif; ?><?php endif; ?>
								<?php if ($this->_var['order_item']['deal_info']['begin_time'] < $this->_var['now'] && ( $this->_var['order_item']['deal_info']['end_time'] > $this->_var['now'] || $this->_var['order_item']['deal_info']['end_time'] == 0 )): ?><?php echo $this->_var['lang']['notEnd']; ?><?php endif; ?>
							<?php endif; ?>
				
					<?php else: ?>
						<?php if ($this->_var['order_item']['is_success'] == 0): ?>
						<?php echo $this->_var['lang']['failure']; ?>&nbsp;<?php if ($this->_var['order_item']['repay_time'] > 0): ?><?php echo $this->_var['lang']['redound']; ?><?php echo $this->_var['lang']['granted']; ?><?php else: ?><?php echo $this->_var['lang']['granting']; ?><?php echo $this->_var['lang']['redound']; ?><?php endif; ?>
						<?php else: ?>
						<?php echo $this->_var['lang']['success2']; ?>&nbsp;<?php if ($this->_var['order_item']['is_refund'] == 1): ?><?php echo $this->_var['lang']['refunded']; ?><?php else: ?><?php echo $this->_var['lang']['refunding']; ?><?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
					<?php endif; ?>
				</td>
				<td>
					<?php if ($this->_var['order_item']['order_status'] == 0): ?>
						<a href="<?php
echo parse_url_tag("u:account#view_order|"."id=".$this->_var['order_item']['id']."".""); 
?>"><?php echo $this->_var['lang']['InfoPay8']; ?></a>
						<a href="<?php
echo parse_url_tag("u:account#del_order|"."id=".$this->_var['order_item']['id']."".""); 
?>" class="del_deal"><?php echo $this->_var['lang']['delate']; ?></a>
					<?php else: ?>
						<a href="<?php
echo parse_url_tag("u:account#view_order|"."id=".$this->_var['order_item']['id']."".""); 
?>"><?php echo $this->_var['lang']['viewDetail']; ?></a>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</table>
		
		<?php else: ?>
		<div class="empty_tip">
			<?php echo $this->_var['lang']['InfoStatus4']; ?><?php echo $this->_var['lang']['suppot']; ?><?php echo $this->_var['lang']['record']; ?>
		</div>
		<?php endif; ?>
		
		</div>
		<div class="blank"></div>
		<div class="pages"><?php echo $this->_var['pages']; ?></div>
		<div class="blank"></div>
		
		<div class="blank"></div>
		
	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 