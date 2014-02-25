<?php
class FriendModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}

	protected function _after_find(&$resultSet,$options) {
		
	}
	
	public function getFensiCount($self){
		$res = D('Friend')->where(array('other' => $self))->count();
		return $res;
	}
	
	public function getFriendCount($self){
		$res = D('Friend')->where(array('self' => $self))->count();
		return $res;
	}
	
	public function isFriend($other){
		$res = D('Friend')->where(array('self' => $this->oUser['id'], 'other' => $other))->find();
		return !empty($res) ? 1 : 0;
	}
}