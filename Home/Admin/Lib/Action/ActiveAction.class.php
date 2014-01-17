<?php 

/**
 * 	活动
 */
class ActiveAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
	
		$this->model = D('Active');
	}
	
	//列表
	public function index(){
		$params = array(
			'order' => 'createtime DESC',
		);

		$this->_getPageList($params);
	}
	
	/*
	 * 审核
	 */
	public function audit() {
		$this->_audit();
	}
	
}
?>