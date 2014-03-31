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


<div id="banbg" style="height:320px"></div>


<div class="wrap">
	<div class="Crowdfunding-Site">
    	<nav class="clearfix  f_l" style="padding-top:30px">
        	<ul>
            	<li><a href="#" class="default">众筹首页</a></li>
                <li><a href="#">众筹项目</a></li>
                <li><a href="#">发起众筹项目</a></li>
            </ul>
        </nav>
        <div class="f_r clearfix" style="padding-top:25px">
        	<div class="f_r selt">
            	<form>
                	<input type="text" name="context" id="context" value="搜索项目" />
                    <input type="button" name="conbut" id="conbut" />
                </form>
            </div>
            <a href="#" class="service f_r" style="margin-right:30px">服务介绍</a>
        </div>
    </div>
	<div class="clearfix">
		<div id="index_images" class="index_images f_l" style=' margin-left:0; margin-top:10px; width:648px'>		
				<div class="roll_box">
				<?php $_from = $this->_var['image_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'image_item');if (count($_from)):
    foreach ($_from AS $this->_var['image_item']):
?>
				<a href="<?php echo $this->_var['image_item']['url']; ?>" title="<?php echo $this->_var['image_item']['title']; ?>">
					<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image_item']['image'],
  'w' => '960',
  'h' => '280',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"  alt="<?php echo $this->_var['image_item']['title']; ?>" />
				</a>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>			
		</div>
		<div class="f_r" style="margin-top:10px"><img src="http://localhost/yisheji/fw/app/Tpl/codec2i/images/rigm.png" width="300" height="280" /></div>
	</div>
	
    
	<div class="f_l">
		<ul class="tab-nav">
			<li class="current"><a href="<?php
echo parse_url_tag("u:index|"."".""); 
?>"><?php echo $this->_var['lang']['recommend']; ?></a></li>
			<li><a href="<?php
echo parse_url_tag("u:deals|"."r=new".""); 
?>"><?php echo $this->_var['lang']['newonline']; ?></a></li>
			<li><a href="<?php
echo parse_url_tag("u:deals|"."r=nend".""); 
?>"><?php echo $this->_var['lang']['ending']; ?></a></li>
			<li><a href="<?php
echo parse_url_tag("u:deals|"."r=classic".""); 
?>"><?php echo $this->_var['lang']['cassic']; ?></a></li>
		</ul>
	</div>
	<div class="f_r">
		<ul class="tab-nav">
			<?php $_from = $this->_var['cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_item');if (count($_from)):
    foreach ($_from AS $this->_var['cate_item']):
?>
			<li><a href="<?php
echo parse_url_tag("u:deals|"."id=".$this->_var['cate_item']['id']."".""); 
?>" title="<?php echo $this->_var['cate_item']['name']; ?>"><?php echo $this->_var['cate_item']['name']; ?></a></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
	<div class="blank"></div>
	<div class="blank"></div>
	<div class="blank"></div>
	<div id="pin_box">
	<?php echo $this->fetch('inc/deal_list.html'); ?>
	</div>	
	<div class="blank"></div>
	<div id="pin_loading" rel="<?php
echo parse_url_tag("u:ajax#index|"."p=".$this->_var['current_page']."".""); 
?>">正在努力加载</div>	
	
</div>
<?php echo $this->fetch('inc/footer.html'); ?> 