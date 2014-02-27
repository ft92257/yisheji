<?php
if (!defined('THINK_PATH')) exit();

$DB = require("config.inc.php");	//数据库配置


//系统配置
$system = array(
	//'SHOW_PAGE_TRACE'=>1,
	//路由配置
	'URL_MODEL'             => 3,							//URL重写，兼容模式  如：home.php?s=/User/user   或者  home.php/User/user
	'URL_ROUTER_ON'   => true, //开启路由
//	'URL_HTML_SUFFIX' => '.html',	//URL伪静态
	
	//session及时区配置
	'SESSION_AUTO_START' => true,				//session常开
	'DEFAULT_TIMEZONE'=>'Asia/Shanghai', 	// 设置默认时区
	//分页配置
	'VAR_PAGE'=>'p',	
			
	//模板配置
	'DEFAULT_THEME' => 'default',
	'TMPL_ACTION_SUCCESS' => 'public:success',
	'TMPL_ACTION_ERROR' => 'public:error',

	//上传文件目录	
	'TMPL_PARSE_STRING' => array(
		'__FILES__' => 'data/files',
		'__STATICS__' => 'statics/admin',
	),
		
	'OUTPUT_ENCODE' => false,
		
	//自定义
	'HOST_URL' => getHostUrl(),
	
	//项目信息	
	'APP_INFO' => array(
		'id' => 1,
		'name' => '上海主站',		
	),
	
);

function getHostUrl() {
	$s = 'http://' . $_SERVER['HTTP_HOST'];
	if ($_SERVER['SERVER_PORT'] != '80') {
		$s .= ':' . $_SERVER['SERVER_PORT'];
	}
	$s .= dirname($_SERVER['SCRIPT_NAME']) . '/';

	return $s;
}

return array_merge($DB, $system);
?>