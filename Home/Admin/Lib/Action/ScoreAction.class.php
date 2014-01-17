<?php 

/**
 * 	评分
 */
class ScoreAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
	
		$this->model = D('Score');
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