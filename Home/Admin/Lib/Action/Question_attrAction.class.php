<?php 

/**
 * 	问题
 */
class Question_attrAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
		$this->model = D('Question_attr');
	}
	
	/*
	 * 添加问题答案
	 */
	public function add(){
		if ($this->isPost()) {
			$id = getRequest('id');
			$this->_add(array('qid'=>$id));
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