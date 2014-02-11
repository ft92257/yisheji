<?php
class LetterModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}

	protected function _after_find(&$resultSet,$options) {
		$user = D('User');
		
		$res = $user->where(array('id' => $resultSet['sender']))->find();
		$resultSet['name_zh'] = $res['nickname'] ? $res['nickname'] : $res['account'];
		$resultSet['header'] = getFileUrl($res['avatar']);
		$resultSet['time_zh'] = date('Y-m-d h:i:s', $resultSet['createtime']);
		if($this->oUser['id'] > 0){
			$resultSet['is_sender'] = $resultSet['sender'] == $this->oUser['id'] ? 1 : 0;
		}
		
	}
}