<?php
class ActiveAction extends BaseAction{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function activeIndex(){
		$this->assign('activeType', $this->_aBaseOptions['activeType']);
		$this->assign('style', $this->_aBaseOptions['style']);
		
		$this->assign('activeImg', $this->activeFocus());
		
		$data = $this->activeList();
		$this->assign('activeList', $data['list']);
		$this->assign('activePage', $data['page']);
		
		$this->assign('search', $this->para);
		$this->display();
	}
	
	public function activeDetails(){
		if(!$this->para['id']){
			redirect(__URL__.'/activeIndex');
		}
		$this->model = D('Active');
		$data = $this->model->queryOne(array('id' => $this->para['id']));
		if(empty($data)){
			redirect(__URL__.'/activeIndex');
		}
		$this->assign('activeInfo', $data);
		$this->display();
	}
	
	public function activeList(){
		$this->model = D('Active');
		$where = array();
		$order = false;
		if($this->para['list_type']>0){
			$where = array('type' => $this->para['list_type']);
		}
		if($this->para['list_collect_count']>0){
			$order = $this->para['list_collect_count'] == 1 ? 'desc' : '';
			$order =  "list_collect_count {$order}";
		}
		if($this->para['list_createtime']>0){
			$order = $this->para['list_createtime'] == 1 ? 'desc' : '';
			$order =  "list_createtime {$order}";
		}
		if($this->para['cid'] > 0){
			$where['cid'] = $this->para['cid'];
		}
		return $this->model->getList($where, $order, 5, true);
	}
	
	public function activeFocus(){
		$this->model = D('Active');
		return $this->model->getList(array(), 'recommend desc, createtime desc', 10);
	}
	
	public function activeImgList(){
		if(!$this->para['id']){
			redirect(__URL__.'/activeIndex');
		}
		$this->model = D('Picture');
		$data = $this->model->getList(array('type' => 1, 'target' => $this->para['id']));
		$this->assign('id', $this->para['id']);
		$this->assign('activePhoto', $data);
		$this->display();
	}
	
	public function activeImgDetails(){
		if(!$this->para['id']){
			redirect(__URL__.'/activeIndex');
		}
		$this->model = D('Picture');
		$data = $this->model->getList(array('type' => 1, 'target' => $this->para['id']));
		$this->assign('id', $this->para['id']);
		$this->assign('activePhoto', $data);
		$this->display();
	}
	
	public function signUp(){
		$this->model = D('Active_partner');
		$where = array(
				'aid' => $this->para['aid'],
				'type' => 1,
				'uid' => $this->oUser['id']
				);
		$res = $this->model->queryOne($where);
		if(!empty($res)){
			$this->resultFormat(null, -1);
		}
		$data = array(
				'aid' => $this->para['aid'],
				'type' => 1,
				'uid' => $this->oUser['id'],
				'name' => $this->para['name'],
				'telephone' => $this->para['telephone']
		);
		$res = $this->model->insert($data);
		$res !== false ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0, $this->model->getLastSql()); 
	}
	
}