<?php

import('Public.Library.qqAuth.Tencent', './');
class QqAuth {
	protected $client_id = '801459707';
	protected $client_secret = '84c47c72c4610f16bc711edaa842c47a';
	protected $debug = true;
	
	public function run() {
		OAuth::init($this->client_id, $this->client_secret);
		Tencent::$debug = $this->debug;
		
		if ($_SESSION['t_access_token'] || ($_SESSION['t_openid'] && $_SESSION['t_openkey'])) {//用户已授权
			echo '<pre><h3>已授权</h3>用户信息：<br>';
			//获取用户信息
			$r = Tencent::api('user/info');
			print_r(json_decode($r, true));
			echo '</pre>';
		} else {//未授权
			//$callback = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];//回调url
			$callback = 'http://' . $_SERVER['HTTP_HOST'] . __SELF__;
			if ($_GET['code']) {//已获得code
				$code = $_GET['code'];
				$openid = $_GET['openid'];
				$openkey = $_GET['openkey'];
				//获取授权token
				$url = OAuth::getAccessToken($code, $callback);
				$r = Http::request($url);
				parse_str($r, $out);
				//存储授权数据
				if ($out['access_token']) {
					$_SESSION['t_access_token'] = $out['access_token'];
					$_SESSION['t_refresh_token'] = $out['refresh_token'];
					$_SESSION['t_expire_in'] = $out['expires_in'];
					$_SESSION['t_code'] = $code;
					$_SESSION['t_openid'] = $openid;
					$_SESSION['t_openkey'] = $openkey;
		
					//验证授权
					$r = OAuth::checkOAuthValid();
					if ($r) {
						header('Location: ' . $callback);//刷新页面
					} else {
						exit('<h3>授权失败,请重试</h3>');
					}
				} else {
					exit($r);
				}
			} else {//获取授权code
				if ($_GET['openid'] && $_GET['openkey']){//应用频道
					$_SESSION['t_openid'] = $_GET['openid'];
					$_SESSION['t_openkey'] = $_GET['openkey'];
					//验证授权
					$r = OAuth::checkOAuthValid();
					if ($r) {
						header('Location: ' . $callback);//刷新页面
					} else {
						exit('<h3>授权失败,请重试</h3>');
					}
				} else{
					$url = OAuth::getAuthorizeURL($callback);
					header('Location: ' . $url);
				}
			}
		}
	}
}

?>