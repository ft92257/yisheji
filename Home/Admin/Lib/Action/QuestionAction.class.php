<?php 

/**
 * 	问题
 */
class QuestionAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
	
		$this->model = D('Question');
	}
	
	/*
	 * 添加问题
	 */
	public function add(){
		if ($this->isPost()) {
			$this->_add($dataBase);
		} else {
			$this->_display_form();
		}
	}
	/*
	 * 列表
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
	/*
	 * 修改
	 */
	public function edit() {
		$data = $this->model->getById(getRequest('id'));
		
		if ($this->isPost()) {
			$this->_edit($data);
		} else {
			$this->_display_form($data, 'add');
		}
	}
}
?>