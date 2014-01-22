<?php 
class SessionModel extends BaseModel {
	
	public function check() {
		$key = $_COOKIE['SN_KEY'];
		if (empty($key)) {
			return false;
		}
		$data = $this->where(array('key'=>$key))->find();
		if (empty($data)) {
			return false;
		}
		if (($data['expire'] + 7200) < time()) {
			return false;
		} 
		if (ip2long($_SERVER["REMOTE_ADDR"]) != $data['ip']) {
			return false;
		}
		$this->where(array('id'=>$data['id']))->data(array('expire' => time() + 7200))->save();
		
		return $data['uid'];
	}
	
	public function setKey($oUser) {
		$time = time();
		$key = "{$oUser['id'] }|{$oUser['account']}|{$oUser['password']}|{$time}".mt_rand();
		$key = md5($key);
		$data = array(
			'key' => $key,
			'expire' => time() + 7200,
			'ip' => ip2long($_SERVER["REMOTE_ADDR"])
		);
		
		$session = $this->where(array('uid' => $oUser['id']))->find();
		if (empty($session)) {
			$data['appid'] = 1;
			$data['uid'] = $oUser['id'];
			$data['createtime'] = $time;
			$this->add($data);
		} else {
			$this->where(array('uid' => $oUser['id']))->data($data)->save();
		}
		
		$expire = time() + 36000;
		setcookie('SN_KEY', $key, $expire, '/');
		return $key;
	}
	
	public function destroy($uid) {
		if ($uid) {
			$this->where(array('uid' => $uid))->data(array('expire' => 0))->save();
		}
	}
}



?>