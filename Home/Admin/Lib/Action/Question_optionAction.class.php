<?php 

/**
 * 	问题
 */
class Question_optionAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
		$this->model = D('Question_option');
	}
	
	/*
	 * 添加问题答案
	 */
	public function add(){
		if ($this->isPost()) {
			dump($_POST);
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
		$id = (int)getRequest('id');
		$params = array(
			'order' => 'createtime DESC',
		);
		if($id){
			$params['where'] = array('qid'=>$id);
		}

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