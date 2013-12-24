<?php
$spname="财付通双接口测试";
$partner = "1217052801";                                  	//财付通商户号
$key = "yijianlicaifutong189186180601002";											//财付通密钥

$return_url = "http://127.0.0.1/yisheji/pay/payReturnUrl.php";			//显示支付结果页面,*替换成payReturnUrl.php所在路径
$notify_url = "http://127.0.0.1/yisheji/pay/payNotifyUrl.php";			//支付完成后的回调处理页面,*替换成payNotifyUrl.php所在路径

$aDbConfig = array(
			'host' => '127.0.0.1',
			'user' => 'root',
			'password' => '63351510',
			'dbname' => 'yisheji',
			'charset' => 'utf8',
		);
?>