<?php 

/**
 * 	消费
 */
class MoneyAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
	
		$this->model = D('Money');
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