<?php exit;?>a:3:{s:8:"template";a:4:{i:0;s:54:"C:/wamp/www/yisheji/fw/app/Tpl/codec2i/user_login.html";i:1;s:54:"C:/wamp/www/yisheji/fw/app/Tpl/codec2i/inc/header.html";i:2;s:62:"C:/wamp/www/yisheji/fw/app/Tpl/codec2i/inc/user_login_box.html";i:3;s:54:"C:/wamp/www/yisheji/fw/app/Tpl/codec2i/inc/footer.html";}s:7:"expires";i:1395655765;s:8:"maketime";i:1395652165;}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员登录 - codec2i - 众筹系统</title>
<meta name="keywords" content="SEO关键词" />
<meta name="description" content="SEO描述" />
<link rel="stylesheet" type="text/css" href="http://localhost/yisheji/fw/public/runtime/statics/2240b0a734cc5fe0d7e83a9102d4525e.css" />
<script type="text/javascript">
var APP_ROOT = '/yisheji/fw';
var LOADER_IMG = 'http://localhost/yisheji/fw/app/Tpl/codec2i/images/lazy_loading.gif';
var ERROR_IMG = 'http://localhost/yisheji/fw/app/Tpl/codec2i/images/image_err.gif';
</script>
<script type="text/javascript" src="http://localhost/yisheji/fw/public/runtime/statics/3f195738628750f5538d316db89a8944.js"></script>
</head>
<body>	
<div class="header">
	<div class="wrap">
		<div class="logo f_l" style="margin-top:10px;">
			<a class="link" href="/yisheji/fw/">
								<span style='display:inline-block; width:227px; height:36px; background:url(http://localhost/yisheji/fw/public/attachment/201312/28/21/52bed6c46ebb5.png) no-repeat; _filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=http://localhost/yisheji/fw/public/attachment/201312/28/21/52bed6c46ebb5.png, sizingMethod=scale);_background-image:none;'></span>			</a>
		</div>
		
	   <div  style="margin-top:13px;float:left">	
		<ul class="main_nav f_l" >
               					    <li >
						<span>
						<a href="/yisheji/fw/index.php"  target="" title="首页">首页</a>	
						</span>		
					    </li>
                      					    <li >
						<span>
						<a href="/yisheji/fw/index.php?ctl=deals"  target="" title="浏览项目">浏览项目</a>	
						</span>		
					    </li>
                      					    <li >
						<span>
						<a href="/yisheji/fw/index.php?ctl=project&act=add"  target="" title="发起项目">发起项目</a>	
						</span>		
					    </li>
                      					    <li >
						<span>
						<a href="/yisheji/fw/#"  target="" title="服务介绍">服务介绍</a>	
						</span>		
					    </li>
                      		
                
		</ul>
        	
		<form action="/yisheji/fw/index.php?ctl=deals" method="post" id="header_search_form" class="f_l" style="margin-top:-2px;margin-left:15px;">
			<div class="header_seach">	
			<!--<a href="/yisheji/fw/index.php?ctl=project&act=add" class="add_project f_r"></a>			-->
			<!--<input type="button" value="" class="seach_submit" id="header_submit" />-->
			<input type="text" id="header_keyword" name="k" value="搜索项目" class="seach_text" style="font-size:14px">	
			<input type="hidden" name="redirect" value="1" />				
			</div>
			</form>	
	  </div>
			
		<div class="f_r">
			<div class="login_tip">	
				554fcae493e564ee0dc75bdf2ebf94calogin_tip|YToxOntzOjQ6Im5hbWUiO3M6OToibG9naW5fdGlwIjt9554fcae493e564ee0dc75bdf2ebf94ca			</div>			
			
	
			
		</div>
		
		
		
	</div>		
</div>
	
 
<div class="blank"></div>
<div class="shadow_bg">
	<div class="wrap white_box">
		<script type="text/javascript" src="http://localhost/yisheji/fw/public/runtime/statics/ab0f14255edef5bbc4d2d91f64ad321f.js"></script>
<div class="signlogin_box">
			<div class="left">
				
				<div class="link_dash f25">
					登录				</div>
				<form id="user_login_form" name="user_login_form" action="/yisheji/fw/index.php?ctl=user&act=do_login">
					
				<div class="form_row">
					<div class="blank15"></div>
					<label class="title"><font>*&nbsp;&nbsp;</font>会员:</label>
					<input type="text" value="邮箱或者用户名" class="textbox" name="email"/>
					<div class="blank15"></div>
				</div>
				<div class="form_row">
					<label class="title"><font>*&nbsp;&nbsp;</font>密码:</label>
					<input type="password" name="user_pwd"  class="textbox" />
					<span class="getpassword"><a href="/yisheji/fw/index.php?ctl=user&act=getpassword">忘记密码？</a></span>
					<div class="blank15"></div>
				</div>
				<div class="form_row auto_login">
					<input type="checkbox" value="1" name="auto_login" checked="checked" /> 
					<label class="auto_login_tip">下次自动登陆</label>
					<div class="blank15"></div>
				</div>
				
				<div class="button_row do_login">
					<input type="button" value="登录" name="submit_form" class="btn_do_login" id="btn_do_login" />
					<input type="hidden" value="1" name="ajax" />
					<div class="blank15"></div>
				</div>
				
				</form>
			</div>
			
			<div class="right">
				<div class="link_dash f16">
					快速用微博登陆				
				</div>		
				<div class="blank"></div>		
				554fcae493e564ee0dc75bdf2ebf94caapi_login|YToxOntzOjQ6Im5hbWUiO3M6OToiYXBpX2xvZ2luIjt9554fcae493e564ee0dc75bdf2ebf94ca				<span class="no_account_tip">没有账号?</span>
				<a href="/yisheji/fw/index.php?ctl=user&act=register" class="btn_go_register" title="注册">注册</a>
				
			</div>
			<div class="blank"></div>
			
		</div> 
	</div>
</div>
<div class="blank"></div>
<div id="gotop"></div>
<div class="blank"></div>
<div class="footer">
<div class="ui-title ui-title-hz">
<div class="ui-title-l">合作伙伴</div>
<div class="ui-title-r">
<a href="#"></a>
</div></div>
<div class="h-media-reports">
<p>
<a href="/medias" title="36氪" target="_blank"><img src="app/Tpl/codec2i/images/36ke.gif"></a>
<a href="/medias" title="北京日报" target="_blank"><img src="app/Tpl/codec2i/images/beijingribao.gif"></a>
<a href="/medias" title="第一财经周刊" target="_blank"><img src="app/Tpl/codec2i/images/diyicaijing.gif"></a>
<a href="/medias" title="虎嗅" target="_blank"><img src="app/Tpl/codec2i/images/huxiu.gif"></a>
<a href="/medias" title="凤凰网" target="_blank"><img src="app/Tpl/codec2i/images/ifeng.gif"></a>
<a href="/medias" title="商业周刊/中文版" target="_blank"><img src="app/Tpl/codec2i/images/shangyezhoukan.gif"></a>
<a href="/medias" title="搜狐" target="_blank"><img src="app/Tpl/codec2i/images/souhu.gif"></a>
</p>
</div>
<div class="h-media-reports-b">
<ul>
<li>
<p>点名时间的运作模式</p>     
筹资项目必须在发起人预设的时间内达到或超过目标金额才算成功。没有达到目标的项目，支持款项将全额退回给所有支持者。<br><br>
所有项目发起人都需经过实名认证。项目筹资前都需通过工作人员审核才能上线。项目发起人会清楚标示项目的潜在风险，以及将采取的补救措施。</li>
</ul>
<ul>
<li><p>点名时间收费吗？</p>       
点名时间是一个开放，免费的众筹平台，无论项目成功与否点名时间都不收取任何手续费。
<br><br>
<p>我支持的钱什么时候会给项目发起人?</p>
项目成功后就会立即将款项交付给项目发起人。
</li>
</ul>
<ul class="h-media-reports-b-r">
<li><p>如果筹资成功的项目最终无法完<br>成怎么办？</p>         
上线之前点名时间会做基本审核，确认项目内容完整可执行。但是在项目执行过程中，有些项目可能无法达到预期，项目发起人会在风险说明里注明是否退款或提供其他补偿。<br><br>
</li>
<li><a href="/intro" target="_blank" class="h-media-reports-b-r-more">查看完整介绍 &amp; 常见问题</a></li>
</ul>
</div>
<div class="footerwrap" style="width:960px;margin:0 auto;padding: 25px 0px;">
<a href="/yisheji/fw/index.php?ctl=help&act=term" title="服务条款">服务条款</a>
<a href="/yisheji/fw/index.php?ctl=help&act=intro" title="服务介绍">服务介绍</a>
<a href="/yisheji/fw/index.php?ctl=help&act=privacy" title="隐私策略">隐私策略</a>
<a href="/yisheji/fw/index.php?ctl=help&act=about" title="关于我们">关于我们</a>
<p>codec2i</p>
<div id="backtop" class="backtop" style="display: block;"><a href="#top"></a></div>
</div>
</div>
 
