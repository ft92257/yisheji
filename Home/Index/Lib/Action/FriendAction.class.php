<?php
class FriendAction extends BaseAction{

	public function __construct() {
		parent::__construct();
	}
	
	#加关注
	public function  add(){
		$data = array(
				'self' => $this->oUser['id'],
				'other' => $this->para['uid']
				);
		$this->model = D('Friend');
		/*
		$id = $this->model->insert($data);
		if (!$id) {
			$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
		}
		*/
		$type = D('User')->where(array('id' => $this->oUser['id']))->getField('type');
		$this->resultFormat(null, 0, $type);
		switch($this->para['utype']){
			case '1':
				$this->model = D('User_owner');
				break;
			case '2':
				$this->model = D('User_designer');
				break;
			case '3':
				$this->model = D('Company');
				break;
		}
		$res = updateCache($this->model, array('uid' => $this->oUser['id']), array('friend_count', '+1'));
		if ($res === false){
			$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
		}
		$type = D('User')->where(array('id' => $this->para['uid']))->getField('type');
		switch($this->para['utype']){
			case '1':
				$this->model = D('User_owner');
				break;
			case '2':
				$this->model = D('User_designer');
				break;
			case '3':
				$this->model = D('Company');
				break;
		}
		$res = updateCache($this->model, array('uid' => $this->para['uid']), array('fensi_count', '+1'));
		if ($res === false){
			$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
		}
		$this->resultFormat(null, 1);
	}
	
	#取消关注
	public function del(){
		$where = array(
				'self' => $this->oUser['id'],
				'other' => $this->para['uid']
				);
		$this->model = D('Friend');
		$res = $this->model->delete($where);
		if($res === false){
			$this->resultFormat(null, 0, $this->model->getLastSql());
		}
			
		$type = D('User')->where(array('id' => $this->oUser['id']))->getField('type');
		switch($this->para['utype']){
			case '1':
				$this->model = D('User_owner');
				break;
			case '2':
				$this->model = D('User_designer');
				break;
			case '3':
				$this->model = D('Company');
				break;
		}
		$res = updateCache($this->model, array('uid' => $this->oUser['id']), array('friend_count', '-1'));
		if ($res === false){
			$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
		}
		$type = D('User')->where(array('id' => $this->para['uid']))->getField('type');
		switch($this->para['utype']){
			case '1':
				$this->model = D('User_owner');
				break;
			case '2':
				$this->model = D('User_designer');
				break;
			case '3':
				$this->model = D('Company');
				break;
		}
		$res = updateCache($this->model, array('uid' => $this->para['uid']), array('fensi_count', '-1'));
		if ($res === false){
			$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
		}
		$this->resultFormat(null, 1);
	}
}