<?php echo $this->fetch('inc/header.html'); ?> 
<?php
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/avatar.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/avatar.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/ajaxupload.js";
$this->_var['dpagejs'][] = $this->_var['TMPL_REAL']."/js/switch_city.js";
$this->_var['dcpagejs'][] = $this->_var['TMPL_REAL']."/js/switch_city.js";
$this->_var['dpagejs'][] = APP_ROOT_PATH."/system/region.js";
$this->_var['dcpagejs'][] = APP_ROOT_PATH."/system/region.js";
?>

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
			 <?php echo $this->_var['lang']['userSet']; ?>
		</div>
		<div class="switch_nav">
			<ul>
				<li class="current"><a href="<?php
echo parse_url_tag("u:settings#index|"."".""); 
?>"><?php echo $this->_var['lang']['userInfo']; ?></a></li>
				<li><a href="<?php
echo parse_url_tag("u:settings#password|"."".""); 
?>"><?php echo $this->_var['lang']['changePass']; ?></a></li>
				<li><a href="<?php
echo parse_url_tag("u:settings#consignee|"."".""); 
?>"><?php echo $this->_var['lang']['postAdd']; ?></a></li>
				<li><a href="<?php
echo parse_url_tag("u:settings#bind|"."".""); 
?>"><?php echo $this->_var['lang']['bangSet']; ?></a></li>
				<?php if ($this->_var['user_info']['ex_real_name'] == '' && $this->_var['user_info']['ex_account_info'] == '' && $this->_var['user_info']['ex_contact'] == ''): ?>
				<li><a href="<?php
echo parse_url_tag("u:settings#bank|"."".""); 
?>"><?php echo $this->_var['lang']['bankAccount']; ?></a></li>
				<?php endif; ?>
			</ul>
		</div>
		
		<div class="blank"></div>
		
		<div class="left">
			<form class="ajax_form" action="<?php
echo parse_url_tag("u:settings#save_index|"."".""); 
?>">
									
				<div class="form_row">
					<div class="blank15"></div>
					<label class="title w100"><?php echo $this->_var['lang']['username']; ?>:</label>
					<input type="text" value="<?php echo $this->_var['user_info']['user_name']; ?>" class="textbox" disabled="true" />
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100"><?php echo $this->_var['lang']['email']; ?>:</label>
					<input type="text" value="<?php echo $this->_var['user_info']['email']; ?>" class="textbox" disabled="true" />
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100"><?php echo $this->_var['lang']['sex']; ?>:</label>
					<div class="select_box">
					<select name="sex">
						<option value="-1" <?php if ($this->_var['user_info']['sex'] == - 1): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['lang']['unknown']; ?></option>
						<option value="1" <?php if ($this->_var['user_info']['sex'] == 1): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['lang']['male']; ?></option>
						<option value="0" <?php if ($this->_var['user_info']['sex'] == 0): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['lang']['female']; ?></option>
					</select>
					</div>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100"><?php echo $this->_var['lang']['nowArea']; ?>:</label>
					<div class="select_box">
					<select name="province">				
					<option value="" rel="0"><?php echo $this->_var['lang']['InfoLogin1']; ?></option>			
					<?php $_from = $this->_var['region_lv2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
						<option value="<?php echo $this->_var['region']['name']; ?>" rel="<?php echo $this->_var['region']['id']; ?>" <?php if ($this->_var['region']['selected']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</select>
					
					<select name="city">				
					<option value="" rel="0"><?php echo $this->_var['lang']['InfoLogin2']; ?></option>
					<?php $_from = $this->_var['region_lv3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'region');if (count($_from)):
    foreach ($_from AS $this->_var['region']):
?>
						<option value="<?php echo $this->_var['region']['name']; ?>" rel="<?php echo $this->_var['region']['id']; ?>" <?php if ($this->_var['region']['selected']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['region']['name']; ?></option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</select>
					</div>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title w100"><?php echo $this->_var['lang']['userInfo']; ?>:</label>
					<textarea name="intro" class="textarea"><?php echo $this->_var['user_info']['intro']; ?></textarea>
					<div class="blank1"></div>
					<div class="form_tip"><?php echo $this->_var['lang']['InfoLogin3']; ?></div>
					<div class="blank15"></div>
				</div>
				
				<div class="form_row">
					<label class="title w100"><?php echo $this->_var['lang']['blog']; ?><?php echo $this->_var['lang']['or']; ?><?php echo $this->_var['lang']['weibo']; ?>:</label>
					<div class="f_l">
						<div  id="weibo_list">
						<?php if ($this->_var['weibo_list']): ?>
						<?php $_from = $this->_var['weibo_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'weibo_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['weibo_item']):
?>
							<div>
							<input type="text" value="<?php echo $this->_var['weibo_item']['weibo_url']; ?>" class="textbox" name="weibo_url[]" />
							<?php if ($this->_var['key'] > 0): ?>
							<a href="javascript:void(0);" class="del_weibo form_link_btn"  onclick="del_weibo(this);"><?php echo $this->_var['lang']['delate']; ?></a>
							<?php endif; ?>
							<div class="blank"></div>
							</div>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						<?php else: ?>
							<div>
							<input type="text" value="" class="textbox" name="weibo_url[]" />							
							<div class="blank"></div>
							</div>
						<?php endif; ?>
						</div>
						<a href="javascript:void(0);" class="more_weibo form_link_btn" onclick="add_weibo();"><?php echo $this->_var['lang']['more']; ?></a>
					</div>
					<div class="blank15"></div>
				</div>
				
				<div class="submit_btn_row">
					<div class="ui-button green" rel="green">
						<div>
							<span><?php echo $this->_var['lang']['save']; ?><?php echo $this->_var['lang']['InfoLogin4']; ?></span>
						</div>
					</div>
					<input type="hidden" value="1" name="ajax" />
					<div class="blank15"></div>
				</div>
				
			</form>
		</div><!--left-->
		<div class="right">
			<?php echo $this->_var['lang']['userPhoto']; ?>
			<div class="blank"></div>
			<img id="avatar" src="<?php 
$k = array (
  'name' => 'get_user_avatar',
  'uid' => $this->_var['user_info']['id'],
  'type' => 'middle',
);
echo $k['name']($k['uid'],$k['type']);
?>" />
			<div class="blank"></div>
			<label class="fileupload" onclick="upd_file(this,'avatar_file',<?php echo $this->_var['user_info']['id']; ?>);"><?php echo $this->_var['lang']['uploadimg']; ?>
			<input type="file" class="filebox" name="avatar_file" id="avatar_file"/>
			
			</label>
			<label class="fileuploading hide" ><?php echo $this->_var['lang']['uploading']; ?></label>
		</div>
		
		<div class="blank"></div>
		
	</div>
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 