<?php 

/**
 * 	举报信息
 */
class ReportAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
	
		$this->model = D('Report');
	}
	
	/*
	 * 举报列表
	 */
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
