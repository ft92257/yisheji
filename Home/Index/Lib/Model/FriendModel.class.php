<?php
class FriendModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}

	protected function _after_find(&$resultSet,$options) {
		$self =  D('User')->getById($resultSet['self']);
		$other =  D('User')->getById($resultSet['other']);
	}
	
	public function isFriend($other){
		$res = D('Friend')->where(array('self' => $this->oUser['id'], 'other' => $other))->find();
		return !empty($res) ? 1 : 0;
	}
}