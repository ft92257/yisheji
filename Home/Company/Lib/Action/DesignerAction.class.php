<?php 

/**
 * 	设计师管理
 */
class DesignerAction extends BaseAction {
  
	public function __construct() {
		parent::__construct();
	
		//装修公司才能操作
		if ($this->oCom->type != 1) {
			$this->error('非法操作！');
		}
		
		$this->model = D('User_designer');
	}
	
	/*
	 * 列表
	 */
	public function index() {
		$data = $this->model->getAll();
		$this->assign('data', $data);

		$this->display();
	}
	
	/*
	 * 添加设计师
	 */
	public function add() {
		if ($this->isPost()) {
				$password = getRequest('password');
				$repassword = getRequest('repassword');
				if(!($password || $repassword)){
					$this->error('请输入密码');
				}
				if($password || $repassword){
			    	if($password != $repassword){
			    		$this->error('两次密码输入不一致');
			    	}
				}
			$database = array(
				'type' => 2,//设计师
			);
			$this->model = D('User');
			$uid = $this->_add($database, '', true);
			if (!$uid) {
				$this->error($this->model->getError());
			}
			
			$database = array(
					'uid' => $uid,
					'cid' => $this->oCom->id,
			);
			$this->model = D('User_designer');
			$this->_add($database);
		} else {
			$this->_display_form();
		}
	}
	
	public function delete() {
		$uid = getRequest('uid');
		$where = array(
				'uid' => $uid,
				'cid' => $this->oCom->id,
		);
		
		$aDesigner = $this->model->where($where)->find();
		if (empty($aDesigner)) {
			$this->error('没有该设计师!');
		}

		$this->model->del($where);
		
		D('User')->del(array('id' => $uid));
		
		$this->success('删除成功！');
	}
	/*
	 * 修改
	 */
	public function edit() {
		$aDsner = $this->model->getById(getRequest('id'));
		$aUser = D('User')->getById($aDsner['uid']);
		$data = array_merge($aDsner,$aUser);
		$this->checkPurviewData($data);
		
		if ($this->isPost()) {
			$this->_edit($data);
		} else {
			$this->_display_form($data);
		}
	}
}
?>