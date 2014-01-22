<?php
class myAction extends BaseAction{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function myCollect(){
		$this->model = D('Collect');
		$data = $this->model->getList(array('uid' => $this->oUser['id']), 'createtime desc', 20, 1);
		$this->assign('myCollect', $data['list']);
		$this->display();
	}
	
	public function myLetterList(){
		$this->model = D('Letter');
		$where = array('recipient'=>$this->oUser['id'], 'status2' => 1);
		$data = $this->model->getList($where, 'createtime desc', 10, 1, 'sender');
		
		foreach($data['list'] as $k=>$v){
			$where = array('_string' => "(sender = {$this->oUser['id']} and status1 = 1 and recipient = {$v['sender']}) or recipient = {$this->oUser['id']} and status2 = 1 and sender = {$v['sender']}");
			$data['list'][$k]['total'] = $this->model->where($where)->count();
		}
		
		$this->assign('letterList', $data['list']);
		$this->assign('letterPage', $data['page']);
		$this->display();
	}
	
	public function myLetterDetails(){
		$res = D('User')->where(array('id' => $this->para['id']))->find();
		$this->assign('sender', $this->oUser['id']);
		$this->assign('recipient', $this->para['id']);
		$this->assign('recipient_name', $res['nickname'] ? $res['nickname'] : $res['account']);
		
		$this->model = D('Letter');
		$where = array('_string' => "(sender = {$this->oUser['id']} and status1 = 1 and recipient = {$this->para['id']}) or recipient = {$this->oUser['id']} and status2 = 1 and sender = {$this->para['id']}");
		
		$data = $this->model->getList($where, 'createtime desc', 10, 1);
		$this->assign('letterList', $data['list']);
		
		//更新已读标识
		foreach($data['list'] as $k=>$v){
			$this->model->where(array('id' => $v['id']))->data(array('isread' => 1))->save();
		}
		
		$this->assign('letterPage', $data['page']);
		$this->display();
	}
	
	public function infoEdit(){
		$this->model = D('User');
		$data = array(
				'sex' => $this->para['sex'],
				'occupation' => $this->para['occupation'],
				'province' => $this->para['province'] > 0 ? $this->para['province'] : 0,
				'city' => $this->para['city'] > 0 ? $this->para['city'] : 0,
				'county' => $this->para['county'] > 0 ? $this->para['county'] : 0,
				'mobile' => $this->para['mobile'],
				'web' => $this->para['web'],
				'school' => $this->para['school'],
				'subject' => $this->para['subject'],
				'hobby' => $this->para['hobby'],
				'info' => $this->para['info']
		);
		$where = array('id' => $this->para['uid']);
		$res = $this->model->update($data, $where);
		$res ? $this->resultFormat(null, 1, '设置成功') : $this->resultFormat(null, 0, $this->model->getLastSql());
	}
	
	public function mySet(){
		$this->model = D('User');
		$user = $this->model->where(array('id' => $this->oUser['id']))->find();
		$user['designer'] = 0;
		if($user['type'] == 2){
			$user['designer'] = D('User_designer')->where(array('uid' => $user['id']))->getField('ischeck');
		}
		$this->assign('tag', $this->para['tag'] ? $this->para['tag'] : 0);
		$this->assign('user', $user);
		$this->assign('occupation', $this->model->_aBaseOptions['occupation']);
		$this->assign('hobby', $this->model->_aBaseOptions['hobby']);
		$this->display();
	}
	
	public function headerEdit(){
		$this->model = D('File');
		$res = $this->model->_upload('header', array('thumbs' => '80-80'));
		if($res['status'] == 0){
			$this->model = D('User');
			$data = array('avatar' => $res['data']['fileid']);
			$where = array('id' => $this->oUser['id']);
			$res = $this->model->update($data, $where);
		}
		header("location:".__URL__."/mySet/uid/{$this->oUser['id']}/tag/1");
	}
	
	public function designerApply(){
	
		if($this->para['act'] == '114'){
			$this->model = D('File');
			$res = $this->model->_upload('idcard');
			if($res['status'] == 0){
				$this->model = D('User');
				$data = array(
						'mobile' => $this->para['mobile'],
						'idcard' => $res['data']['fileid'],
						'idnum' => $this->para['idnum'],
						'bankcard' => $this->para['bankcard']
				);
				$where = array('id' => $this->oUser['id']);
				$res = $this->model->update($data, $where);
				$this->model = D('User_designer');
				$data = array(
						'ischeck' => 3
				);
				$where = array('uid' => $this->oUser['id']);
				$res = $this->model->update($data, $where);
			}
			header("location:".__URL__."/mySet/uid/{$this->oUser['id']}/tag/3");
		}
	}
}