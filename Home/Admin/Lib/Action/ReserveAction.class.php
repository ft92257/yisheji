<?php 

/**
 * 	预约
 */
class ReserveAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
	
		$this->model = D('Reserve');
	}
	
	//列表
	public function index(){
		$params = array(
			'order' => 'createtime DESC',
		);

		$this->_getPageList($params);
	}
	
}
?>