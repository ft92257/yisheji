<?php $_from = $this->_var['deal_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'deal_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['deal_item']):
?>
	<div class="deal_item_box f_l <?php if ($this->_var['key'] % 4 == 0): ?>first<?php endif; ?>">
			<div class="deal_content_box" style="padding-left:0;padding-right:0;padding-top:0;overflow:hidden;border-radius:5px;">
			<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_item']['id']."".""); 
?>" title="<?php echo $this->_var['deal_item']['name']; ?>"  style="overflow:hidden">
			<img src="<?php if ($this->_var['deal_item']['image'] == ''): ?><?php echo $this->_var['TMPL']; ?>/images/empty_thumb.gif<?php else: ?><?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['deal_item']['image'],
  'w' => '226',
  'h' => '176',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?><?php endif; ?>" alt="<?php echo $this->_var['deal_item']['name']; ?>"  width="226"  style="overflow:hidden"/>
			</a>
			<div class="blank"></div>
			<a href="<?php
echo parse_url_tag("u:deal#show|"."id=".$this->_var['deal_item']['id']."".""); 
?>" title="<?php echo $this->_var['deal_item']['name']; ?>" class="deal_title"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['name'],
  'b' => '0',
  'e' => '25',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></a>
			
			<!--<div class="deal_loc">
			<?php if ($this->_var['deal_item']['user_name'] == ''): ?><?php else: ?>
			<a href="<?php
echo parse_url_tag("u:home|"."id=".$this->_var['deal_item']['user_id']."".""); 
?>"><?php echo $this->_var['deal_item']['user_name']; ?></a>&nbsp;&nbsp;
			<?php endif; ?>
			<?php if ($this->_var['deal_item']['province'] != '' || $this->_var['deal_item']['city'] != ''): ?>
			(
			<?php if ($this->_var['deal_item']['province'] != ''): ?>
			<span><a href="<?php
echo parse_url_tag("u:deals|"."loc=".$this->_var['deal_item']['province']."".""); 
?>" title="<?php echo $this->_var['deal_item']['province']; ?>"><?php echo $this->_var['deal_item']['province']; ?></a></span>
			<?php endif; ?>
			<?php if ($this->_var['deal_item']['city'] != ''): ?>
			<span><a href="<?php
echo parse_url_tag("u:deals|"."loc=".$this->_var['deal_item']['city']."".""); 
?>" title="<?php echo $this->_var['deal_item']['city']; ?>"><?php echo $this->_var['deal_item']['city']; ?></a></span>
			<?php endif; ?>
			)
			<?php endif; ?>
			</div>-->
			<div class="blank"></div>
			<div class="deal_brief" title="<?php echo $this->_var['deal_item']['brief']; ?>"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['deal_item']['brief'],
  'b' => '0',
  'e' => '45',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></div>
			</div>
			<div class="deal_item_dash"></div>
      <div class="paiduan deal_content_box">
        <ul>
     
         <li>
            <a title="<?php echo $this->_var['deal_item']['name']; ?>" href="<?php
echo parse_url_tag("u:deal|"."act=update&id=".$this->_var['deal_item']['id']."".""); 
?>"><?php echo $this->_var['lang']['feed']; ?>(<span><?php echo $this->_var['deal_item']['log_count']; ?></span></a>)
          </li>
          <li>
            <a title="<?php echo $this->_var['deal_item']['name']; ?>" href="<?php
echo parse_url_tag("u:deal|"."act=support&id=".$this->_var['deal_item']['id']."".""); 
?>"><?php echo $this->_var['lang']['zuser']; ?>(<span><?php echo $this->_var['deal_item']['support_count']; ?></span></a>)
          </li>

         
        </ul>
        <div class="">
					<span class="">
            <?php if ($this->_var['deal_item']['is_success']): ?>
            <span class="num_1" style=" background:#5fb760"><?php echo $this->_var['lang']['success']; ?></span>
            <?php elseif ($this->_var['deal_item']['end_time'] > $this->_var['now']): ?>
            <span class="num_1"  style="background:#428bca"><?php echo $this->_var['lang']['ing']; ?></span>
            <?php else: ?>
            <span class="num_2"  style="background:#999999"><?php echo $this->_var['lang']['failure']; ?></span>
            <?php endif; ?>
          </span>	
				</div>
      </div>
			<div class="deal_content_box" style="padding-top:0">				
				<div class="ui-progress">
					<span style="width:<?php echo $this->_var['deal_item']['percent']; ?>%;"></span>
				</div>			
				<div class="blank"></div>
				<div class="div3"  style=" text-align:left"><span class="num"><?php echo $this->_var['deal_item']['percent']; ?>%</span><span class="til"><?php echo $this->_var['lang']['reach']; ?></span></div>
				<div class="div3"  style=" text-align:center"><span class="num" ><font><?php 
$k = array (
  'name' => 'round',
  'v' => $this->_var['deal_item']['support_amount'],
  'e' => '2',
);
echo $k['name']($k['v'],$k['e']);
?></font><?php echo $this->_var['lang']['RMB']; ?></span><span class="til"><?php echo $this->_var['lang']['supported']; ?></span></div>
				<div class="div3"  style=" text-align:right">
					<?php if ($this->_var['deal_item']['begin_time'] > $this->_var['now']): ?>
					<span class="num"><?php echo $this->_var['lang']['onlineed']; ?></span>
					<span class="til"><?php echo $this->_var['lang']['endtime']; ?></span>
					<?php elseif ($this->_var['deal_item']['end_time'] < $this->_var['now'] && $this->_var['deal_item']['end_time'] != 0): ?>
					<span class="num"><?php echo $this->_var['lang']['ended']; ?></span>
					<span class="til"><?php echo $this->_var['lang']['endtime']; ?></span>
					<?php else: ?>
					<span class="num">
						<?php if ($this->_var['deal_item']['end_time'] == 0): ?>
						<?php echo $this->_var['lang']['langcassic']; ?>
						<?php else: ?>
						<font><?php echo $this->_var['deal_item']['remain_days']; ?></font><?php echo $this->_var['lang']['days']; ?>
						<?php endif; ?>
					</span>
					<span class="til" style=" text-align:right"><?php echo $this->_var['lang']['endtime']; ?></span>
					<?php endif; ?>					
				</div>
				<div class="blank1"></div>
			</div>
	</div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>