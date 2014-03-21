<?php
class SearchAction extends BaseAction{
	
	public function __construct() {
		parent::__construct();
	}
	
	function searchList(){
		$this->model = D('Search');
		$data = $this->model->getList(array('content', array('like', $this->para['keyword'])), false, 10, true);
		$this->assign('caseList', $data['list']);
		$this->assign('casePage', $data['page']);
		$this->display();
	}
	
	
}