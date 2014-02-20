<?php
class FriendAction extends BaseAction{

	public function __construct() {
		parent::__construct();
	}
	
	public function  add(){
		$data = array(
				'self' => $this->oUser['id'],
				'other' => $this->para['uid']
				);
		$this->model = D('Friend');
		$id = $this->model->insert($data);
		if (!$id) {
			$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
		}
		$this->resultFormat(null, 1);
	}
	
	public function del(){
		$where = array(
				'self' => $this->oUser['id'],
				'other' => $this->para['uid']
				);
		$this->model = D('Friend');
		$res = $this->model->delete($where);
		$res != false ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0, $this->model->getLastSql());
	}
}