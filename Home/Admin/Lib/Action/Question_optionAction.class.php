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
	public function add1(){
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
		$id = (int)getRequest('id');
		$params = array(
			'order' => 'createtime DESC',
		);
		if($id){
			$params['where'] = array('qid'=>$id);
		}
		$this->assign('id',$id);
		$this->_getPageList($params);
	}
	public function add(){
		//dump($res);echo $res['data']['fileid'];
		$id = $_REQUEST['id'];
		$aQues = D('Question')->where(array('id'=>$id))->getField('attr');
		$aQttr = D('Question')->attr[$aQues];
		$ops = $_REQUEST['ops'] ? $_REQUEST['ops'] : 2;
		$this->model->addAnswer($ops,$id);
		$this->assign('id',$id);
		$this->assign('aqt',$aQttr);
		$this->assign('ops',$ops);
		$this->display();
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
		$data['pic']=getFileUrl($data['pic']);
		if ($this->isPost()) {
			$this->_edit($data);
		} else {
			$this->_display_form($data, 'add');
		}
	}
}
?>