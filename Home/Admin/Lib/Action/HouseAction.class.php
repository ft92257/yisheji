<?php 

/**
 * 	样板房
 */
class HouseAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
	
		$this->model = D('House');
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