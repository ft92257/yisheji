<?php
class LetterAction extends BaseAction {
	
	public function __construct() {
		
		parent::__construct();
	}
	
	public  function getLetterList($request = false, $limit = 15){
		$this->model = D('Letter');
		$request['act'] = isset($request['act']) ? $request['act'] : 0;
		
		switch($request['act']){
			case '1'://发信箱
				$where = array('sender' => $this->oUser['id'], 'status1' => 1);
				break;
			case '2'://收信箱
				$where = array('recipient' => $this->oUser['id'], 'status2' => 1);
				break;
			default:
				$where = array('_string' => "(sender = {$this->oUser['id']} and status1 = 1) or recipient = {$this->oUser['id']} and status2 = 1");
		}
		return $this->model->getList($where, 'createtime desc', $limit, 1);
	}
	
	public function sendLetter(){
		$this->model = D('Letter');
		$data = array(
				'sender' => $this->para['sender'],
				'recipient' => $this->para['recipient'],
				'content' => $this->para['content']
				);
		$res = $this->model->insert($data);
		$res ? $this->resultFormat(null, 1, '你成功的对TA发送了一封私信') : $this->resultFormat(null, 0, $this->model->getLastSql());
	}
	
	public  function delLetter(){
		$this->model = D('Letter');
		switch($this->para['type']){
			case 'byId':
				$where = array('id' => array('in', $this->para['ids']));
				break;
			case 'bySender':
				$where = array('sender' => array('in', $this->para['ids']));
				break;
			case 'byRecipient':
				$where = array('recipient' => array('in', $this->para['ids']));
				break;
		}
		$res = $this->model->where($where)->select();
		foreach($res as $k => $v){
			if($this->oUser['id'] == $v['sender']){
				$where = array('id' => $v['id']);
				$data = array('status1' => 0);
			}
			if($this->oUser['id'] == $v['recipient']){
				$where = array('id' => $v['id']);
				$data = array('status2' => 0);
			}
			$res = $this->model->update($data, $where);
			if(!res){
				$this->resultFormat(null, 0, $this->model->getLastSql());
			}
		}
		$this->resultFormat(null, 1, '删除成功');
	}
	
}
?>