<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/deal.css";
$this->_var['dpagecss'][] = $this->_var['TMPL_REAL']."/css/fancybox.css";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/jquery.fancybox.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/deal.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/deal.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/faq.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/faq.js";

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
<?php echo $this->fetch('inc/deal_header.html'); ?>
<div class="blank"></div>
<div class="shadow_bg">
	<div class="wrap white_box">
		

		
		<div class="deal_box">
			<div class="deal_left">
				<div class="image_box">
				<?php if ($this->_var['deal_info']['source_vedio'] == ''): ?>
				<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['deal_info']['image'],
  'w' => '600',
  'h' => '430',
);
echo $k['name']($k['v'],$k['w'],$k['h']);
?>" alt="<?php echo $this->_var['deal_info']['name']; ?>" />
				<?php else: ?>
				<embed wmode="opaque"wmode="opaque"src="<?php echo $this->_var['deal_info']['source_vedio']; ?>" allowFullScreen="true" quality="high" width="570" height="430" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
				<?php endif; ?>
				</div>
				<div class="blank"></div>
				<div class="share_row">
				<div class="f_l">
				<!-- JiaThis Button BEGIN -->
				<div class="jiathis_style">
					<span class="jiathis_txt"><?php echo $this->_var['lang']['shareTo']; ?>:</span>
					<a class="jiathis_button_icons_1"></a>
					<a class="jiathis_button_icons_2"></a>
					<a class="jiathis_button_icons_3"></a>
					<a class="jiathis_button_icons_4"></a>
					<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
					<a class="jiathis_counter_style"></a>
				</div>
				<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1350118827221983" charset="utf-8"></script>
				<!-- JiaThis Button END -->
				</div>
				<div class="f_r deal_url">
				<input type="text" name="deal_url" /> 
				<span></span>
				</div>
				</div>
				<div class="blank"></div>
				<div class="blank"></div>
				<div class="deal_description">
					<?php echo $this->_var['deal_info']['description']; ?>
				</div>
				<div class="blank"></div>				
				
				<div class="deal_qa">
					
						<?php $_from = $this->_var['deal_faq_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'faq');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['faq']):
?>
			
							<div class="faq_question" rel="<?php echo $this->_var['faq']['id']; ?>"> - <?php echo $this->_var['faq']['question']; ?></div>
							<div class="faq_answer" rel="<?php echo $this->_var['faq']['id']; ?>"><?php 
$k = array (
  'name' => 'nl2br',
  'v' => $this->_var['faq']['answer'],
);
echo $k['name']($k['v']);
?></div>
							<div class="blank"></div>
	
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					
				</div>
				<div class="blank"></div>
				<?php if ($this->_var['deal_info']['tags'] != ''): ?>
				<div class="blank"></div>
				<div class="deal_tags">
					<?php echo $this->_var['lang']['tag']; ?>:
					<?php $_from = $this->_var['deal_info']['tags_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tag');if (count($_from)):
    foreach ($_from AS $this->_var['tag']):
?>
					<?php if (trim ( $this->_var['tag'] ) != ''): ?>
					<a href="<?php
echo parse_url_tag("u:deals|"."tag=".$this->_var['tag']."".""); 
?>" title="<?php echo $this->_var['tag']; ?>"><?php echo $this->_var['tag']; ?></a>&nbsp;
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</div>
				<div class="blank"></div>
				<?php endif; ?>
				<div class="blank"></div>
				<div class="deal_contact">
					<div class="f_l"><?php echo $this->_var['lang']['InfoProject1']; ?></div>
					<div class="f_r">
						<div class="ui-button blue" rel="blue" onclick="send_message(<?php echo $this->_var['deal_info']['user_id']; ?>);">
							<div>
								<span><?php echo $this->_var['lang']['ask']; ?></span>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<div class="deal_right">
				<?php echo $this->fetch('inc/deal_right.html'); ?>
			</div><!--end right-->
		</div>
		
		<div class="blank"></div>
		
	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 