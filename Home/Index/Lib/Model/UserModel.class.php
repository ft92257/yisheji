<?php 
class UserModel extends BaseModel {
	
	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		$resultSet['type_zh'] = $this->_aBaseOptions['userType'][$resultSet['type']];
		$resultSet['reg_ip_zh'] = long2ip($resultSet['reg_ip']);
		$resultSet['header'] = getFileUrl($resultSet['avatar']);
		$resultSet['idcard'] = getFileUrl($resultSet['idcard']);
	}
	
	public function login($account, $password) {
		$oUser = $this->where(array('account' => $account, 'password' => md5($password)))->find();
		if(empty($oUser)){
			return  false;
		}
		D('Session')->setKey($oUser);
		return $oUser;
	}

}



?>