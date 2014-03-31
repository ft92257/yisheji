<?php
class ApiAction extends BaseAction{
	private  $action;
	
	public function __construct() {
		parent::__construct();
		$this->action = C('HOST_URL').'fw/index.php/';
	}
	
	private  function post_curl($param){
		$o="";
		foreach ($param as $k=>$v){
			$o.= "{$k}=".urlencode($v)."&";
		}
		$post_data=substr($o,0,-1);
		$ch = curl_init();
		curl_setopt_array($ch,
		array(
		CURLOPT_URL => $this->action,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS =>$post_data
		)
		);
		$content = curl_exec($ch);
		return $content;
	}
	
	public function getZhouchouAll(){
		
		$arr = array(
				'ctl'=>'api',
				'act'=>'index',
				'l' =>6
				);
		$result = $this->post_curl($arr);
		return json_decode($result, 1);
	}
}