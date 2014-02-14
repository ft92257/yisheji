<?php

/**
 * 获取数组val值中的字段
 * @param Array $arr
 * @param string $field
 * return Array
 */
function getArrayByField(&$arr,$field, $key = '') {
	$aRet = array();
	if ($key !== '') {
		foreach ($arr AS $aVal) {
			$aRet[$aVal[$key]] = $aVal[$field];
		}
	} else {
		foreach ($arr AS $aVal) {
			$aRet[] = $aVal[$field];
		}
	}
	return $aRet;
}

/**
 * 根据Val值，重新排序数组
 * @param Array $arr
 * @param unknown_type $k
 */
function setArrayKey(&$arr,$k) {
	$aRet = array();
	foreach ($arr AS $key=>$val) {
		$aRet[$val[$k]][] = $arr[$key];
	}
	return $aRet;
}

/*
 * 获取request变量
 */
function getRequest($name = false, $default = '') {
	if(!$name){
		return $_REQUEST;
	}
	if (isset($_POST[$name])) {
		return $_POST[$name];
	} elseif (isset($_GET[$name])) {
		return $_GET[$name];
	} else {
		return $default;
	}
}


/*
 * 过滤逗号分割的数字字符串 如 1,2,3
 */
function filterNumList($numlist, $separator = ',') {
	$aNums = explode($separator, $numlist);
	
	foreach ($aNums as &$value) {
		$value = intval($value);
	}
	
	return join($separator, $aNums);
}


/*
 * 发送手机短信消息
* param $mod array 手机号码
* param $msg 消息
*/
function sendMobileMsg($mob, $msg){
	if (!is_array($mob)) {
		$mob = array($mob);
	}
	
	$r_main = array(
			'sms_qm' => '易监理',
			'sms_n' => 'SDK-SWW-010-00228',
			'sms_p' => '781516',
	);
	$p_max=10;
	$c_mob_a=count($mob);
	if($r_main['sms_qm']!='')$msg.='【'.$r_main['sms_qm'].'】';
	$msg=urlencode(@iconv('UTF-8', 'GB2312', $msg));
	$pwd=strtoupper(md5($r_main['sms_n'].$r_main['sms_p']));
	if($c_mob_a>$p_max){
		foreach($d_av as $v){
			$xu='http://sdk2.entinfo.cn/z_mdsmssend.aspx?sn='.$r_main['sms_n'].'&pwd='.$pwd.'&mobile='.join(',', $v).'&content='.$msg.'&stime=';
			$xc=@file_get_contents($xu);
		}
	}else{
		$xu='http://sdk2.entinfo.cn/z_mdsmssend.aspx?sn='.$r_main['sms_n'].'&pwd='.$pwd.'&mobile='.join(',', $mob).'&content='.$msg.'&stime=';
		$xc=@file_get_contents($xu);
	}
	if($xc!='' && trim($xc)!=''){
		if(intval(trim($xc))>0){
			$sid=1;
			$sinfo='发送成功';
		}else{
			$sid=trim($xc);
			$sinfo='';
		}
	}else{
		$sid=800;
		$sinfo='服务器连接失败';
	}
	return array($sid, $sinfo);
}

/*
 * 获取文件的URL访问地址
 * @param $fid file表的id
 * @param $thumb 缩略图标志，默认空返回原图（原文件）
 * @param default 默认图片
 */
function getFileUrl($fid, $thumb='', $default = '') {
	$File = D('File');
	$aFile = $File->getById($fid);
	$url = $File->getUrl($aFile, $thumb, $default);
	return $url;
}

/*
 * 替换{var}为$data['var']
 */
function _replaceValue(&$mVal, $data) {
	if (is_array($mVal)) {
		foreach ($mVal as &$val) {
			_replaceValue($val, $data);
		}
	} else {
		preg_match_all("/\{\w+\}/", $mVal, $matches);
		foreach ($matches[0] as $value) {
			$key = str_replace(array('{', '}'), '', $value);
			$mVal = str_replace($value, $data[$key], $mVal);
		}
	}
}

/*
 * 插入数组单元到某个键值的单元后面，$afterkey为空则插入最前面
 */
function insertArray($arr,$afterkey,$insertArr) {
	$ret = array();
	if(!$afterkey){
		$ret = $insertArr;
	}
	foreach($arr as $k=>$v) {
		$ret[$k] = $v;
		if($k = $afterkey){
			$ret[key($insertArr)] = current($insertArr);
		}
	}

	return $ret;
}

/**
 * 把HTML标签转换为字符串
 * @param Array、Object、Str  $_date
 * @return Array、Object、Str
 */
function htmlString ($_date) {
	if (is_array($_date)) {
		foreach ($_date as $_key => $_value) {
			$_string[$_key] =  htmlString($_value);
		}
	} else if (is_object($_date)) {
		foreach ($_date as $_key => $_value) {
			$_string->$_key =  htmlString($_value);
		}
	} else {
		$_string = htmlspecialchars($_date);
	}
	return $_string;//传入的是对象，返回对象、是数组，返回数组、是字符串则返回字符串
}

/*
 * 检测手机号
*/
function checkMobile($mobile) {
	return preg_match("/^1[358]\d{9}$/", $mobile);
}

/*
 * 格式化时间表达式
 */
function time_tran($the_time){
	$now_time = date("Y-m-d H:i:s");
	$now_time = strtotime($now_time);
	$show_time = $the_time;
	$dur = $now_time - $show_time;
	if($dur < 60){
		return $dur.'秒前';
	}else{
		if($dur < 3600){
			return floor($dur/60).'分钟前';
		}else{
			if($dur < 86400){
				return floor($dur/3600).'小时前';
			}else{
				if($dur < 259200){//3天内
					return floor($dur/86400).'天前';
				}else{
					return $the_time;
				}
			}
		}
	}
}

function getStar($score){
	if($score == 0){
		$html = <<<begin
				<span></span>
begin;
	} else if ($score > 0 && $score < 1) {
		$html = <<<begin
				<span class="star-6"></span>
begin;
	} else if ($score == 1) {
		$html = <<<begin
				<span class="star-1"></span>
begin;
	} else if ($score > 1 && $score < 2) {
		$html = <<<begin
				<span class="star-7"></span>
begin;
	} else if ($score == 2) {
		$html = <<<begin
				<span class="star-2"></span>
begin;
	} else if ($score > 2 && $score < 3) {
		$html = <<<begin
				<span class="star-8"></span>
begin;
	} else if ($score == 3) {
		$html = <<<begin
				<span class="star-3"></span>
begin;
	} else if ($score > 3 && $score < 4) {
		$html = <<<begin
				<span class="star-9"></span>
begin;
	} else if ($score == 4) {
		$html = <<<begin
				<span class="star-4"></span>
begin;
	} else if ($score> 4 && $score < 5) {
		$html = <<<begin
				<span class="star-10"></span>
begin;
	} else if ($score == 5) {
		$html = <<<begin
				<span class="star-5"></span>
begin;
	}
	return $html;
}

function formatTag($tagString){
	return explode(',', $tagString);
}

?>