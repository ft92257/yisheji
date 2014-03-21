<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/index.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/index.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/index.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/discover.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/discover.js";
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
<div class="wrap">
	
	<div class="bar">
      <a href="index.php"><?php echo $this->_var['lang']['index']; ?></a><span>/</span>
      <a href="index.php?ctl=deals"><?php echo $this->_var['lang']['lookcassic']; ?></a>
      
      <?php if ($this->_var['p_r'] == 'all'): ?>
        <span>/</span>
        <a  href="<?php
echo parse_url_tag("u:deals|"."r=all".""); 
?>"><?php echo $this->_var['lang']['alls']; ?></a>
      <?php endif; ?>
      
      <?php if ($this->_var['p_r'] == 'rec'): ?>
        <span>/</span>
        <a href="<?php
echo parse_url_tag("u:deals|"."r=rec".""); 
?>"><?php echo $this->_var['lang']['recommend']; ?></a>
      <?php endif; ?> 
      <?php if ($this->_var['p_r'] == 'new'): ?>
        <span>/</span>
        <a href="<?php
echo parse_url_tag("u:deals|"."r=new".""); 
?>"><?php echo $this->_var['lang']['newonline']; ?></a>
      <?php endif; ?>
      <?php if ($this->_var['p_r'] == 'nend'): ?>
        <span>/</span>
        <a href="<?php
echo parse_url_tag("u:deals|"."r=nend".""); 
?>"><?php echo $this->_var['lang']['ending']; ?></a>
      <?php endif; ?>  
      <?php if ($this->_var['p_r'] == 'classic'): ?> 
        <span>/</span>
        <a href="<?php
echo parse_url_tag("u:deals|"."r=classic".""); 
?>"><?php echo $this->_var['lang']['cassic']; ?></a>
      <?php endif; ?>
      
      
       <?php if ($this->_var['p_id']): ?> 
          <span>/</span>
          <a href="<?php
echo parse_url_tag("u:deals|"."r=".$this->_var['p_r']."&id=".$this->_var['p_id']."&loc=".$this->_var['p_loc']."".""); 
?>"><?php echo $this->_var['p_id_name']; ?></a>
          
       <?php endif; ?>
       
       
       
        <?php if ($this->_var['p_loc']): ?> 
          <?php if ($this->_var['p_loc'] == 'all'): ?> 
          <?php else: ?>
          <span>/</span>
          <a href="<?php
echo parse_url_tag("u:deals|"."r=".$this->_var['p_r']."&id=".$this->_var['p_id']."&loc=".$this->_var['p_loc']."".""); 
?>"><?php echo $this->_var['p_loc']; ?></a>
          <?php endif; ?>
       <?php endif; ?>
      
      
    </div>
	
	<div class="ui-deals-filter clearfix">
		<div class="ui-deals-filter-item clearfix">
			<div class="ui-deals-filter-l f_l">
				属性：
			</div>
			<div class="ui-deals-filter-r f_r">
				<ul>
          <li <?php if ($this->_var['p_r'] == 'all' || ! $this->_var['p_r']): ?>class="current"<?php endif; ?>><a title="所有属性" href="<?php
echo parse_url_tag("u:deals|"."r=all&id=".$this->_var['p_id']."&loc=".$this->_var['p_loc']."".""); 
?>">所有属性</a></li>
		  <li <?php if ($this->_var['p_r'] == 'rec'): ?> class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deals|"."r=rec&id=".$this->_var['cate_item']['id']."&loc=".$this->_var['p_loc']."".""); 
?>">推荐项目</a></li>
          <li <?php if ($this->_var['p_r'] == 'new'): ?> class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deals|"."r=new&id=".$this->_var['cate_item']['id']."&loc=".$this->_var['p_loc']."".""); 
?>">最新上线</a></li>
          <li <?php if ($this->_var['p_r'] == 'nend'): ?> class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deals|"."r=nend&id=".$this->_var['cate_item']['id']."&loc=".$this->_var['p_loc']."".""); 
?>">即将结束</a></li>
          <li <?php if ($this->_var['p_r'] == 'classic'): ?> class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deals|"."r=classic&id=".$this->_var['cate_item']['id']."&loc=".$this->_var['p_loc']."".""); 
?>">经典项目</a></li>
				</ul>
			</div>
		</div>
		<div class="ui-deals-filter-item clearfix">
			<div class="ui-deals-filter-l f_l">
				分类：
			</div>
			<div class="ui-deals-filter-r f_r">
				<ul>
          <li <?php if ($this->_var['p_id'] == 'all' || ! $this->_var['p_id']): ?>class="current"<?php endif; ?>><a title="所有分类" href="<?php
echo parse_url_tag("u:deals|"."r=".$this->_var['p_r']."&id=all&loc=".$this->_var['p_loc']."".""); 
?>">所有分类</a></li>
          <?php $_from = $this->_var['cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['cate_item']):
?>
          <li <?php if ($this->_var['p_id'] == $this->_var['cate_item']['id']): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deals|"."r=".$this->_var['p_r']."&id=".$this->_var['cate_item']['id']."&loc=".$this->_var['p_loc']."".""); 
?>" title="<?php echo $this->_var['cate_item']['name']; ?>"><?php echo $this->_var['cate_item']['name']; ?></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>
		</div>
    <div class="ui-deals-filter-item clearfix">
			<div class="ui-deals-filter-l f_l">
				地区：
			</div>
			<div class="ui-deals-filter-r f_r">
				<ul>
          <li <?php if ($this->_var['p_loc'] == 'all' || ! $this->_var['p_loc']): ?>class="current"<?php endif; ?>><a title="所有地区" href="<?php
echo parse_url_tag("u:deals|"."r=".$this->_var['p_r']."&id=".$this->_var['p_id']."&loc=all".""); 
?>">所有地区</a></li>
          <?php $_from = $this->_var['loc_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'loc_item');if (count($_from)):
    foreach ($_from AS $this->_var['loc_item']):
?>
          <li <?php if ($this->_var['p_loc'] == $this->_var['loc_item']['province']): ?>class="current"<?php endif; ?>><a href="<?php
echo parse_url_tag("u:deals|"."r=".$this->_var['p_r']."&id=".$this->_var['p_id']."&loc=".$this->_var['loc_item']['province']."".""); 
?>" title="<?php echo $this->_var['loc_item']['province']; ?>"><?php echo $this->_var['loc_item']['province']; ?></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
			</div>
		</div>
  </div>
	<div class="blank"></div>
	<div class="blank"></div>
	<div class="blank"></div>
	<div id="pin_box">
	<?php echo $this->fetch('inc/deal_list.html'); ?>
	</div>	
	<div class="blank"></div>
	<div id="pin_loading" rel="<?php
echo parse_url_tag("u:ajax#deals|"."r=".$this->_var['p_r']."&id=".$this->_var['p_id']."&loc=".$this->_var['p_loc']."&tag=".$this->_var['p_tag']."&k=".$this->_var['p_k']."&p=".$this->_var['current_page']."".""); 
?>">正在努力加载</div>	
	<div class="pages"><?php echo $this->_var['pages']; ?></div>
</div>
<?php echo $this->fetch('inc/footer.html'); ?> 