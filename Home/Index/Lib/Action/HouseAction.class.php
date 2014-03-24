<?php
class HouseAction extends BaseAction{

	public function __construct() {
		parent::__construct();
	}
	
	public function houseIndex(){
		$this->assign('decoration_type', $this->_aBaseOptions['decorationType']);
		$this->assign('style', $this->_aBaseOptions['style']);
		
		$this->assign('houseFocus', $this->houseFocus());
		
		$data = $this->houseList();
		$this->assign('houseList', $data['list']);
		$this->assign('housePage', $data['page']);
		
		$this->assign('search', $this->para);
		$this->display();
	}
	
	public function houseDetails(){
		if(!$this->para['id']){
			redirect(__URL__.'/houseIndex');
		}
		$this->model = D('House');
		$data = $this->model->queryOne(array('id' => $this->para['id']));
		if(empty($data)){
			redirect(__URL__.'/houseIndex');
		}
		$this->assign('houseInfo', $data);
		
		$this->model = D("Comment");
		$where = array(
				'type' => '4',
				'target' => $data['id']
		);
		$data = $this->model->getList($where, "createtime desc", 5, true);
		$this->assign('houseComment', $data['list']);
		$this->assign('houseCommentPage', $data['page']);
		$this->display();
	}
	
	public function houseList(){
		$this->model = D('House');
		$where = array();
		$order = false;
		if($this->para['list_decoration_type']){
			$where = array_merge($where, array('decoration_type' => $this->para['list_decoration_type']));
		}
		if($this->para['list_style']){
			$where = array_merge($where, array('style' => $this->para['list_style']));
		}
		if($this->para['list_order']){
			$order =  "{$this->para['list_order']} desc";
		}
		if($this->para['cid'] > 0){
			$where['cid'] = $this->para['cid'];
		}
		return $this->model->getList($where, $order, 10, true);
	}
	
	public function houseFocus(){
		$this->model = D('House');
		$where = array();
		$order = "";
		if($this->para['focus_decoration_type']){
			$where = array('decoration_type' => $this->para['focus_decoration_type']);
		}
		if($this->para['focus_order']){
			$order = "{$this->para['focus_order']} desc ,";
		}
		return $this->model->getList($where, "{$order} createtime desc", 6);
	}
	
	public function houseApply(){
		$this->model = D('House_apply');
		$res = $this->model->queryOne(array('uid' => $this->oUser['id'], 'target' => $this->para['target']));
		if(!empty($res)){
			$this->resultFormat(null, 0, '您不能重复申请一次');
		}
		$data = array(
				'uid' => $this->oUser['id'],
				'name' => $this->para['name'],
				'telephone' => $this->para['telephone'],
				'community' => $this->para['community'],
				'target' => $this->para['target'],
				'cid' => $this->para['cid']
				);
		$id = $this->model->insert($data);
		return $id > 0 ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
	}
}