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
		$this->display();
	}
	
	public function houseList(){
		$this->model = D('House');
		$where = array();
		$order = false;
		if($this->para['list_decoration_type']>0){
			$where = array('decoration_type' => $this->para['list_decoration_type']);
		}
		if($this->para['list_style']>0){
			$where = array('style' => $this->para['list_style']);
		}
		if($this->para['list_collect_count']>0){
			$order = $this->para['list_collect_count'] == 1 ? 'desc' : '';
			$order =  "collect_count {$order}";
		}
		if($this->para['list_createtime']>0){
			$order = $this->para['list_createtime'] == 1 ? 'desc' : '';
			$order =  "createtime {$order}";
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
		if($this->para['focus_orderby']){
			$order = "{$this->para['focus_orderby']} desc ,";
		}
		return $this->model->getList($where, "{$order} createtime desc", 6);
	}
}